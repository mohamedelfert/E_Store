<?php

namespace PHPMVC\Controllers;
use PHPMVC\Models\UsersModel;

class AuthController extends AbstractController
{
    public function loginAction()
    {
        $this->language->load('auth.login');
        $this->_template->swapTemplate([
            ':view'        => ':action_view',
        ]);
        if (isset($_POST['submit'])){
            UsersModel::authenticate($_POST['Username'] , $_POST['Password'] , $this->session);
        }
        $this->_view();
    }

}