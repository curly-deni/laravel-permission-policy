<?php

namespace Aesis\PermissionPolicy\Traits\Internal;

use Illuminate\Support\Facades\Gate;

trait AbstractHasPermissionPolicy
{
    abstract public static function getPolicy();

    public static function bootHasPermissionPolicy()
    {
        if (! is_subclass_of(static::class, \Illuminate\Database\Eloquent\Model::class)) {
            throw new \Exception('The HasPermissionPolicy trait can only be applied to Eloquent models.');
        }

        $classString = encodeClassWithParams(self::getPolicy(), ['model' => static::class]);

        Gate::policy(static::class, $classString);
    }
}
