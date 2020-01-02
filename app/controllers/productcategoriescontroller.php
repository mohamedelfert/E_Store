<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\UploadFiles;
use PHPMVC\Models\ProductCategoriesModel;

class ProductCategoriesController extends AbstractController
{
    use InputFilter;
    use Helper;

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
        $this->language->load('productcategories.messages');

        if (isset($_POST['submit'])){
            $category = new ProductCategoriesModel();
            $category->CatName  = $this->filterString($_POST['CatName']);
            $category->CatImage = (new UploadFiles($_FILES['CatImage']))->upload()->getFileName();
            if ($category->save()){
                $this->messenger->add($this->language->get('text_message_success'));
            }else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/productcategories');
        }
        $this->_view();
    }

//    public function editAction()
//    {
//        // this for group name to show in input for edit or update
//        $id = $this->filterInteger($this->_params[0]);
//        $group = UsersGroupsModel::getByPk($id);
//        if ($group === false){
//            $this->redirect('/usersgroups');
//        }
//        $this->_data['groups'] = $group;
//
//        $this->language->load('template.common');
//        $this->language->load('usersgroups.default');
//
//        $this->_data['privileges'] = privilegesModel::getAll();
//        $extractedPrivilegeIds = $this->_data['groupsPrivileges'] = UsersGroupsPrivilegesModel::getGroupsPrivileges($group);
//
//        if (isset($_POST['submit'])){
//            $group->GroupName = $this->filterString($_POST['groupName']);
//            if ($group->save()){
//                if (isset($_POST['privilege']) && is_array($_POST['privilege'])){
//                    $privilegesIdsToBeDeleted = array_diff($extractedPrivilegeIds, $_POST['privilege']);
//                    $privilegesIdsToBeAdd     = array_diff($_POST['privilege'], $extractedPrivilegeIds);
//
//                    // Delete Unwanted Privileges
//                    foreach ($privilegesIdsToBeDeleted as $deletedPrivileges){
//                        $unwantedPrivileges = UsersGroupsPrivilegesModel::getBy(['PrivilegeId' => $deletedPrivileges, 'GroupId' => $group->GroupId]);
//                        $unwantedPrivileges->current()->delete();
//                    }
//
//                    // Add The New Privileges
//                    foreach($privilegesIdsToBeAdd as $privilegeId){
//                        $groupPrivilege = new UsersGroupsPrivilegesModel();
//                        $groupPrivilege->GroupId     = $group->GroupId;
//                        $groupPrivilege->PrivilegeId = $privilegeId;
//                        $groupPrivilege->save();
//                    }
//                }
//                $this->messenger->add('تم التعديل بنجاح');
//                $this->redirect('/usersgroups');
//            }
//        }
//        $this->_view();
//    }
//
//    public function deleteAction()
//    {
//        $id = $this->filterInteger($this->_params[0]);
//        $group = UsersGroupsModel::getByPk($id);
//        if ($group === false){
//            $this->redirect('/usersgroups');
//        }
//
//        $groupsPrivileges = UsersGroupsPrivilegesModel::getBy(['GroupId' => $group->GroupId]);
//        if ($groupsPrivileges !== false){
//            foreach ($groupsPrivileges as $groupsPrivilege){
//                $groupsPrivilege->delete();
//            }
//        }
//
//        if ($group->delete()){
//            $this->messenger->add('تم الحذف بنجاح');
//            $this->redirect('/usersgroups');
//        }
//        $this->_view();
//    }

}