<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Models\privilegesModel;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;

class UsersGroupsController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('usersgroups.default');
        $this->_data ['groups'] = UsersGroupsModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        $this->language->load('template.common');
        $this->language->load('usersgroups.default');
        $this->_data['privileges'] = privilegesModel::getAll();
        if (isset($_POST['submit'])){
            $group = new UsersGroupsModel();
            $group->GroupName = $this->filterString($_POST['groupName']);
            if ($group->save()){
                if (isset($_POST['privilege']) && is_array($_POST['privilege'])){
                    foreach($_POST['privilege'] as $privilegeId){
                        $groupPrivilege = new UsersGroupsPrivilegesModel();
                        $groupPrivilege->GroupId     = $group->GroupId;
                        $groupPrivilege->PrivilegeId = $privilegeId;
                        $groupPrivilege->save();
                    }
                }
                $this->messenger->add('تم الاضافه بنجاح');
                $this->redirect('/usersgroups');
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        // this for group name to show in input for edit or update
        $id = $this->filterInteger($this->_params[0]);
        $group = UsersGroupsModel::getByPk($id);
        if ($group === false){
            $this->redirect('/usersgroups');
        }
        $this->_data['groups'] = $group;

        $this->language->load('template.common');
        $this->language->load('usersgroups.default');

        $this->_data['privileges'] = privilegesModel::getAll();
        /* نقلت الجزء دا الخاص ب ارجاع الصلاحيات المرتبطه بجروب معين ل الموديل الخاص ب الربط  UsersGroupsPrivilegesModel */
//        $groupsPrivileges          = UsersGroupsPrivilegesModel::getBy(['GroupId' => $group->GroupId]);
//        $extractedPrivilegeIds = [];
//        if ($groupsPrivileges !== false){
//            foreach($groupsPrivileges as $privilege){
//                $extractedPrivilegeIds[] = $privilege->PrivilegeId;
//            }
//        }
        $extractedPrivilegeIds = $this->_data['groupsPrivileges'] = UsersGroupsPrivilegesModel::getGroupsPrivileges($group);

        if (isset($_POST['submit'])){
            $group->GroupName = $this->filterString($_POST['groupName']);
            if ($group->save()){
                if (isset($_POST['privilege']) && is_array($_POST['privilege'])){
                    $privilegesIdsToBeDeleted = array_diff($extractedPrivilegeIds, $_POST['privilege']);
                    $privilegesIdsToBeAdd     = array_diff($_POST['privilege'], $extractedPrivilegeIds);

                    // Delete Unwanted Privileges
                    foreach ($privilegesIdsToBeDeleted as $deletedPrivileges){
                        $unwantedPrivileges = UsersGroupsPrivilegesModel::getBy(['PrivilegeId' => $deletedPrivileges, 'GroupId' => $group->GroupId]);
                        $unwantedPrivileges->current()->delete();
                    }

                    // Add The New Privileges
                    foreach($privilegesIdsToBeAdd as $privilegeId){
                        $groupPrivilege = new UsersGroupsPrivilegesModel();
                        $groupPrivilege->GroupId     = $group->GroupId;
                        $groupPrivilege->PrivilegeId = $privilegeId;
                        $groupPrivilege->save();
                    }
                }
                $this->messenger->add('تم التعديل بنجاح');
                $this->redirect('/usersgroups');
            }
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $group = UsersGroupsModel::getByPk($id);
        if ($group === false){
            $this->redirect('/usersgroups');
        }

        $groupsPrivileges = UsersGroupsPrivilegesModel::getBy(['GroupId' => $group->GroupId]);
        if ($groupsPrivileges !== false){
            foreach ($groupsPrivileges as $groupsPrivilege){
                $groupsPrivilege->delete();
            }
        }

        if ($group->delete()){
            $this->messenger->add('تم الحذف بنجاح');
            $this->redirect('/usersgroups');
        }
        $this->_view();
    }

}