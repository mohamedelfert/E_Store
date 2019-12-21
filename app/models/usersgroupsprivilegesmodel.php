<?php

namespace PHPMVC\Models;

class UsersGroupsPrivilegesModel extends AbstractModel
{
    public $Id;
    public $GroupId;
    public $PrivilegeId;

    protected static $tableName = 'app_users_groups_privileges';

    protected static $tableSchema = array(
        'Id'               => self::DATA_TYPE_INT,
        'GroupId'          => self::DATA_TYPE_INT,
        'PrivilegeId'      => self::DATA_TYPE_INT
    );

    protected static $primaryKey = 'Id';

    public static function getGroupsPrivileges(UsersGroupsModel $group){
        $groupsPrivileges          = self::getBy(['GroupId' => $group->GroupId]);
        $extractedPrivilegeIds = [];
        if ($groupsPrivileges !== false){
            foreach($groupsPrivileges as $privilege){
                $extractedPrivilegeIds[] = $privilege->PrivilegeId;
            }
        }
        return $extractedPrivilegeIds;
    }
}