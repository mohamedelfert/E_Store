<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\lib\messenger;
use PHPMVC\Models\privilegesModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;

class PrivilegesController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('privileges.default');
        $this->_data ['privileges'] = privilegesModel::getAll();
        $this->_view();
    }

    public function addAction(){
        $this->language->load('template.common');
        $this->language->load('privileges.default');
        if (isset($_POST['submit'])){
            $privilege = new privilegesModel();
            $privilege ->Privilege          = $this->filterString($_POST['privilege']) ;
            $privilege ->PrivilegeTitle     = $this->filterString($_POST['privilege_title']) ;
            if ($privilege->save()){
                $this->messenger->add('تم الاضافه بنجاح');
                $this->redirect('/privileges');
            }
        }
        $this->_view();
    }

    public function editAction(){
        $this->language->load('template.common');
        $this->language->load('privileges.default');
        $id = $this->filterInteger($this->_params[0]);
        $privilege = privilegesModel::getByPk($id);
        if ($privilege === false){
            $this->redirect('/privileges');
        }
        $this->_data['privileges'] = $privilege;
        if (isset($_POST['submit'])){
            $privilege ->Privilege          = $this->filterString($_POST['privilege']) ;
            $privilege ->PrivilegeTitle     = $this->filterString($_POST['privilege_title']) ;
            if ($privilege->save()){
                $this->messenger->add('تم التعديل بنجاح');
                $this->redirect('/privileges');
            }else{
                $this->redirect('/privileges');
            }
        }
        $this->_view();
    }

    public function deleteAction(){
        $id = $this->filterInteger($this->_params[0]);
        $privilege = privilegesModel::getByPk($id);
        if ($privilege === false){
            $this->redirect('/privileges');
        }

        $groupsPrivileges = UsersGroupsPrivilegesModel::getBy(['PrivilegeId' => $privilege->PrivilegeId]);
        if ($groupsPrivileges !== false){
            foreach ($groupsPrivileges as $groupsPrivilege){
                $groupsPrivilege->delete();
            }
        }

        if ($privilege->delete()){
            $this->messenger->add('تم الحذف بنجاح');
            $this->redirect('/privileges');
        }
        $this->_view();
    }
}