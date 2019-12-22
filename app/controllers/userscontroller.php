<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Models\UsersModel;

class UsersController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction(){
        $this->language->load('template.common');
        $this->language->load('users.default');
        $this ->_data ['users'] = UsersModel::getAll();
        $this->_view();
    }

    public function addAction(){
        $this->language->load('template.common');
        $this->language->load('users.default');
        $this->_view();
    }

    public function editAction(){
        $this->language->load('template.common');
        $this->language->load('users.default');
        $this->_view();
    }
}