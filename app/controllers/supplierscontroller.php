<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Models\SuppliersModel;

class SuppliersController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles = [
        'SupplierName'        => 'required|alpha|between(5,20)',
        'SupplierPhone'       => 'required|alpha_num|max(15)',
        'SupplierEmail'       => 'required|email|equal_field(SupplierCEmail)',
        'SupplierCEmail'      => 'required|email',
        'SupplierAddress'     => 'required|alpha_num|max(30)'
    ];

    private $_editActionRoles = [
        'SupplierPhone'       => 'alpha_num|max(15)',
        'SupplierEmail'       => 'required|email|equal_field(SupplierCEmail)',
        'SupplierCEmail'      => 'required|email',
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('suppliers.default');
        $this->_data['suppliers'] = SuppliersModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        $this->language->load('template.common');
        $this->language->load('suppliers.default');
        $this->language->load('suppliers.labels');
        $this->language->load('suppliers.errors');
        $this->language->load('suppliers.messages');

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)){
            $supplier = new SuppliersModel();
            $supplier->SupplierName          = $this->filterString($_POST['SupplierName']);
            $supplier->SupplierEmail         = $this->filterEmail($_POST['SupplierEmail']);
            $supplier->SupplierPhone         = $this->filterString($_POST['SupplierPhone']);
            $supplier->SupplierAddress       = $this->filterString($_POST['SupplierAddress']);

            if (SuppliersModel::nameExists($supplier->SupplierName)){
                $this->messenger->add($this->language->get('text_message_exist_name') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/suppliers');
            }
            if (SuppliersModel::emailExists($supplier->SupplierEmail)){
                $this->messenger->add($this->language->get('text_message_exist_email') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/suppliers');
            }
            if (SuppliersModel::phoneExists($supplier->SupplierPhone)){
                $this->messenger->add($this->language->get('text_message_exist_phone') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/suppliers');
            }

            if ($supplier->save()){
                $this->messenger->add($this->language->get('text_message_success'));
            } else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/suppliers');
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $supplier = SuppliersModel::getByPk($id);
        if ($supplier === false){
            $this->redirect('/suppliers');
        }
        $this->_data['supplier']  = $supplier;

        $this->language->load('template.common');
        $this->language->load('suppliers.default');
        $this->language->load('suppliers.labels');
        $this->language->load('suppliers.errors');
        $this->language->load('suppliers.messages');

        if (isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST)){
            $supplier->SupplierPhone      = $this->filterString($_POST['SupplierPhone']);
            $supplier->SupplierEmail      = $this->filterEmail($_POST['SupplierEmail']);

            if (SuppliersModel::emailExists($supplier->SupplierEmail)){
                $this->messenger->add($this->language->get('text_message_exist_email') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/suppliers');
            }
            if (SuppliersModel::phoneExists($supplier->SupplierPhone)){
                $this->messenger->add($this->language->get('text_message_exist_phone') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/suppliers');
            }

            if ($supplier->save()){
                $this->messenger->add($this->language->get('text_message_update'));
            } else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/suppliers');
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $supplier = SuppliersModel::getByPk($id);
        if ($supplier === false){
            $this->redirect('/suppliers');
        }

        $this->language->load('suppliers.messages');

        if ($supplier->delete()){
            $this->messenger->add($this->language->get('text_message_delete_success'));
        } else{
            $this->messenger->add($this->language->get('text_message_delete_failed') , Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/suppliers');
    }
}