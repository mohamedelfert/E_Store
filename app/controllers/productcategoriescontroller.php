<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\UploadFiles;
use PHPMVC\Models\ProductCategoriesModel;
use PHPMVC\LIB\Messenger;

class ProductCategoriesController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles = [
        'CatName'        => 'required|alpha_num|between(5,30)'
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('productcategories.default');
        $this->_data ['categories'] = ProductCategoriesModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        $this->language->load('template.common');
        $this->language->load('productcategories.default');
        $this->language->load('productcategories.errors');
        $this->language->load('productcategories.labels');
        $this->language->load('productcategories.messages');

        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)){
            $category = new ProductCategoriesModel();
            $category->CatName  = $this->filterString($_POST['CatName']);
            if (isset($_FILES['CatImage']) && !empty($_FILES['CatImage']['name'])){
                $uploader = new UploadFiles($_FILES['CatImage']);
                try{
                    $uploader->upload();
                    $category->CatImage = $uploader->getFileName();
                }catch (\Exception $e){
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }
            }else{
                'no-image-post.png';
            }

            if ($uploadError === false && $category->save()){
                $this->messenger->add($this->language->get('text_message_success'));
            }else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/productcategories');
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $category = ProductCategoriesModel::getByPk($id);
        if ($category === false){
            $this->redirect('/productcategories');
        }
        $this->_data['category'] = $category;

        $this->language->load('template.common');
        $this->language->load('productcategories.default');
        $this->language->load('productcategories.errors');
        $this->language->load('productcategories.labels');
        $this->language->load('productcategories.messages');

        $uploadError = false;

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)){
            $category->CatName  = $this->filterString($_POST['CatName']);
            if (!empty($_FILES['CatImage']['name'])){
                // Remove The Old Image
                if ($category->CatImage != '' && file_exists(IMAGES_UPLOAD_DIRECTORY . DS . $category->CatImage)){
                    unlink(IMAGES_UPLOAD_DIRECTORY . DS . $category->CatImage);
                }
                // Create A New Image
                $uploader = new UploadFiles($_FILES['CatImage']);
                try{
                    $uploader->upload();
                    $category->CatImage = $uploader->getFileName();
                }catch (\Exception $e){
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }
            }
            if ($uploadError === false && $category->save()){
                $this->messenger->add($this->language->get('text_message_success'));
            }else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/productcategories');
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $category = ProductCategoriesModel::getByPk($id);
        if ($category === false){
            $this->redirect('/productcategories');
        }
        $this->_data['category'] = $category;

        $this->language->load('productcategories.messages');

        if ($category->delete()){
            // Remove The Old Image
            if ($category->CatImage != '' && file_exists(IMAGES_UPLOAD_DIRECTORY . DS . $category->CatImage)){
                unlink(IMAGES_UPLOAD_DIRECTORY . DS . $category->CatImage);
            }
            $this->messenger->add($this->language->get('text_message_delete_success'));
        }else{
            $this->messenger->add($this->language->get('text_message_delete_failed') , Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/productcategories');
    }

}