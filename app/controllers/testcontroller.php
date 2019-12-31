<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\UsersGroupsPrivilegesModel;

class testController extends AbstractController
{
    public function defaultAction(){
        $privileges = UsersGroupsPrivilegesModel::getPrivilegesForGroups($this->session->user->GroupId);
        echo '<pre>';
        var_dump($this->session->user);
        echo '</pre>';
    }

}