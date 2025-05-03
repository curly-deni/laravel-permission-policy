<?php

namespace Aesis\PermissionPolicy\Traits\Internal;

trait AbstractHasPermissionPolicy
{
    abstract public static function getPolicy();

    public static function bootHasPermissionPolicy()
    {
        if (! is_subclass_of(static::class, \Illuminate\Database\Eloquent\Model::class)) {
            throw new \Exception('The HasPermissionPolicy trait can only be applied to Eloquent models.');
        }
    }
}
