<?php

namespace App\Traits;
trait Role
{
    protected static function assignRole($role)
    {
        $this->role = $role;
    }
    protected static function addRole($role)
    {
        $this->role |= $role;
    }
    protected static function delRole($role)
    {
        $this->role &= ~$role;
    }
    protected static function hasRole($role) : bool
    {
//        return (($this->role & $role) == $role); назначена только эта роль
        return ($this->role & $role) ;
    }
}
