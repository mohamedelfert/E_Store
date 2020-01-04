<?php

namespace PHPMVC\Controllers;
use PHPMVC\Models\UsersModel;

class IndexController extends AbstractController
{
    public function defaultAction(){
        $this->language->load('template.common');
        $this->language->load('index.default');
        $this->language->load('users.default');
        $this->_data['user'] = UsersModel::getUsers($this->session->user);
        $this->_view();
    }

}