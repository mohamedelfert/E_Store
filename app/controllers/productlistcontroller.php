<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\UploadFiles;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\ProductCategoriesModel;
use PHPMVC\Models\ProductListModel;

class ProductListController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles = [
        'ProductName'    => 'required|alpha_num|between(5,30)',
        'CatName'        => 'required|num',
        'Quantity'       => 'required|num',
        'BuyPrice'       => 'required|num',
        'SellPrice'      => 'required|num',
        'Unit'           => 'required|num',
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('productlist.default');
        $this->language->load('productlist.labels');
        $this->_data ['products'] = ProductListModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        $this->language->load('template.common');
        $this->language->load('productlist.default');
        $this->language->load('productlist.errors');
        $this->language->load('productlist.labels');
        $this->language->load('productlist.messages');
        $this->language->load('productlist.unit');

        $this->_data ['product_category'] = ProductCategoriesModel::getAll();
        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)){
            $product = new ProductListModel();
            $product->ProductName  = $this->filterString($_POST['ProductName']);
            $product->CatId        = $this->filterInteger($_POST['CatName']);
            $product->Quantity     = $this->filterInteger($_POST['Quantity']);
            $product->BuyPrice     = $this->filterFloat($_POST['BuyPrice']);
            $product->SellPrice    = $this->filterFloat($_POST['SellPrice']);
            $product->Unit         = $this->filterString($_POST['Unit']);
            if (isset($_FILES['ProductImage']) && !empty($_FILES['ProductImage']['name'])){
                $uploader = new UploadFiles($_FILES['ProductImage']);
                try{
                    $uploader->upload();
                    $product->ProductImage = $uploader->getFileName();
                }catch (\Exception $e){
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }
            }else{
                $product->ProductImage = 'no-image-post.png';
            }

            if ($uploadError === false && $product->save()){
                $this->messenger->add($this->language->get('text_message_success'));
            }else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/productlist');
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $product = ProductListModel::getByPk($id);
        if ($product === false){
            $this->redirect('/productlist');
        }
        $this->_data['product'] = $product;

        $this->language->load('template.common');
        $this->language->load('productlist.default');
        $this->language->load('productlist.errors');
        $this->language->load('productlist.labels');
        $this->language->load('productlist.messages');
        $this->language->load('productlist.unit');

        $this->_data ['product_category'] = ProductCategoriesModel::getAll();
        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)){
            $product->ProductName  = $this->filterString($_POST['ProductName']);
            $product->CatId        = $this->filterInteger($_POST['CatName']);
            $product->Quantity     = $this->filterInteger($_POST['Quantity']);
            $product->BuyPrice     = $this->filterFloat($_POST['BuyPrice']);
            $product->SellPrice    = $this->filterFloat($_POST['SellPrice']);
            $product->Unit         = $this->filterString($_POST['Unit']);
            if (!empty($_FILES['ProductImage']['name'])){
                // Remove The Old Image
                if ($product->ProductImage != '' && file_exists(IMAGES_UPLOAD_DIRECTORY . DS . $product->ProductImage)){
                    unlink(IMAGES_UPLOAD_DIRECTORY . DS . $product->ProductImage);
                }
                // Create A New Image
                $uploader = new UploadFiles($_FILES['ProductImage']);
                try{
                    $uploader->upload();
                    $product->CatImage = $uploader->getFileName();
                }catch (\Exception $e){
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }
            }
            if ($uploadError === false && $product->save()){
                $this->messenger->add($this->language->get('text_message_success'));
            }else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/productlist');
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $product = ProductListModel::getByPk($id);
        if ($product === false){
            $this->redirect('/productlist');
        }
        $this->_data['product'] = $product;

        $this->language->load('productlist.messages');

        if ($product->delete()){
            // Remove The Old Image
            if ($product->ProductImage != '' && file_exists(IMAGES_UPLOAD_DIRECTORY . DS . $product->ProductImage)){
                unlink(IMAGES_UPLOAD_DIRECTORY . DS . $product->ProductImage);
            }
            $this->messenger->add($this->language->get('text_message_delete_success'));
        }else{
            $this->messenger->add($this->language->get('text_message_delete_failed') , Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/productlist');
    }

}