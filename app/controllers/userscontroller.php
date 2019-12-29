<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersModel;

class UsersController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles = [
        'Username'          => 'required|alpha_num|between(4,10)',
        'Password'          => 'required|min(8)|equal_field(CPassword)',
        'CPassword'         => 'required|min(8)',
        'Email'             => 'required|email|equal_field(CEmail)',
        'CEmail'            => 'required|email',
        'PhoneNumber'       => 'alpha_num|max(15)',
        'GroupId'           => 'required|int'
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('users.default');
        $this->_data['users'] = UsersModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        $this->language->load('template.common');
        $this->language->load('users.default');
        $this->language->load('users.labels');
        $this->language->load('users.errors');
        $this->language->load('users.messages');

        $this->_data['groups'] = UsersGroupsModel::getAll();

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)){
            $user = new UsersModel();
            $user->Username          = $this->filterString($_POST['Username']);
            $user->cryptPassword($_POST['Password']);
            $user->Email             = $this->filterEmail($_POST['Email']);
            $user->PhoneNumber       = $this->filterString($_POST['PhoneNumber']);
            $user->SubscriptionDate  = date('Y-m-d');
            $user->LastLogin         = date('Y-m-d H:i:s');
            $user->GroupId           = $this->filterInteger($_POST['GroupId']);
            $user->Status            = 1;
            if ($user->save()){
                $this->messenger->add($this->language->get('text_message_success'));
            } else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/users');
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $users = UsersModel::getByPk($id);
        if ($users === false){
            $this->redirect('/users');
        }
        $this->_data['users']  = $users;

        $this->language->load('template.common');
        $this->language->load('users.default');
        $this->language->load('users.labels');
        $this->language->load('users.errors');
        $this->language->load('users.messages');
        $this->_data['groups'] = UsersGroupsModel::getAll();

        $this->_view();
    }

    public function checkUserExistsAjaxAction()
    {
        if (isset($_POST['Username'])){
            header('Content-type: text/plain');
            if(UsersModel::userExists($this->filterString($_POST['Username'])) !== false){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
}