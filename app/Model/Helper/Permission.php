<?php

namespace App\Model\Helper;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $table = 'permissions';
    protected $guard_name = 'web';

    public static function isExists($name, $guard_name)
    {
        if (!self::where('name', $name)->where('guard_name', $guard_name)->first())
        {
            return false;
        }

        return true;
    }

    public static function createIfNotExists($name, $guard_name)
    {
        if (!self::isExists($name, $guard_name))
        {
            self::create(['name' => $name, 'guard_name' => $guard_name]);
        }

        return self::where('name', $name)->where('guard_name', $guard_name)->first();
    }
}
