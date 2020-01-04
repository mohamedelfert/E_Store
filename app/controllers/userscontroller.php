<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersModel;
use PHPMVC\Models\UsersProfilesModel;

class UsersController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles = [
        'FirstName'         => 'required|alpha|between(3,10)',
        'LastName'          => 'required|alpha|between(3,10)',
        'Username'          => 'required|alpha_num|between(3,12)',
        'Password'          => 'required|min(6)|equal_field(CPassword)',
        'CPassword'         => 'required|min(6)',
        'Email'             => 'required|email|equal_field(CEmail)',
        'CEmail'            => 'required|email',
        'Address'           => 'required|alpha_num|max(30)',
        'DateOfBirth'       => 'required',
        'PhoneNumber'       => 'alpha_num|max(15)',
        'GroupId'           => 'required|int'
    ];

    private $_editActionRoles = [
        'PhoneNumber'       => 'alpha_num|max(15)',
        'GroupId'           => 'required|int'
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('users.default');
        $this->_data['users'] = UsersModel::getUsers($this->session->user);
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

            if (UsersModel::userExists($user->Username)){
                $this->messenger->add($this->language->get('text_message_exist_username') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/users');
            }
            if (UsersModel::emailExists($user->Email)){
                $this->messenger->add($this->language->get('text_message_exist_email') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/users');
            }
            if (UsersModel::phoneExists($user->PhoneNumber)){
                $this->messenger->add($this->language->get('text_message_exist_phone') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/users');
            }

            if ($user->save()){
                $userProfile = new UsersProfilesModel();
                $userProfile->UserId       = $user->UserId;
                $userProfile->FirstName    = $this->filterString($_POST['FirstName']);
                $userProfile->LastName     = $this->filterString($_POST['LastName']);
                $userProfile->Address      = $this->filterString($_POST['Address']);
                $userProfile->DateOfBirth  = $this->filterString($_POST['DateOfBirth']);
                $userProfile->save($primaryKeyCheck = false);
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
        $user = UsersModel::getByPk($id);
        if ($user === false || $this->session->user->UserId == $id){
            $this->redirect('/users');
        }
        $this->_data['users']  = $user;

        $this->language->load('template.common');
        $this->language->load('users.default');
        $this->language->load('users.labels');
        $this->language->load('users.errors');
        $this->language->load('users.messages');

        $this->_data['groups'] = UsersGroupsModel::getAll();

        if (isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST)){
            $user->PhoneNumber       = $this->filterString($_POST['PhoneNumber']);
            $user->GroupId           = $this->filterInteger($_POST['GroupId']);

            if (UsersModel::phoneExists($user->PhoneNumber)){
                $this->messenger->add($this->language->get('text_message_exist_phone') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/users');
            }

            if ($user->save()){
                $this->messenger->add($this->language->get('text_message_update'));
            } else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/users');
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $user = UsersModel::getByPk($id);
        if ($user === false || $this->session->user->UserId == $id){
            $this->redirect('/users');
        }

        $this->language->load('users.messages');

        if ($user->delete()){
            $this->messenger->add($this->language->get('text_message_delete_success'));
        } else{
            $this->messenger->add($this->language->get('text_message_delete_failed') , Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/users');
    }

    public function profileAction()
    {
        $this->language->load('template.common');
        $this->language->load('users.profile');
        $this->_data['users'] = UsersModel::getUsers($this->session->user);
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