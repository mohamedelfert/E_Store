<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersModel;

class UsersController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles = [
        'Username'          => 'required|alpha_num|min(4)|max(15)',
        'Password'          => 'required|min(8)',
        'CPassword'         => 'required|min(8)',
        'Email'             => 'required|email',
        'CEmail'            => 'required|email',
        'PhoneNumber'       => 'int|max(15)',
        'GroupId'           => 'required|int'
    ];

    public function defaultAction(){
        $this->language->load('template.common');
        $this->language->load('users.default');
        $this ->_data ['users'] = UsersModel::getAll();
        $this->_view();
    }

    public function addAction(){
        $this->language->load('template.common');
        $this->language->load('users.default');

        $this->_data['groups'] = UsersGroupsModel::getAll();
        if (isset($_POST['submit'])){
            $this->isValid($this->_createActionRoles, $_POST);
        }
        $this->_view();
    }

    public function editAction(){
        $this->language->load('template.common');
        $this->language->load('users.default');
        $this->_data['groups'] = UsersGroupsModel::getAll();
        $this->_view();
    }
}