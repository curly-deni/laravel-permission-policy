<?php

namespace Aesis\PermissionPolicy\Traits;

use Aesis\PermissionPolicy\Policies\PrivateResourcePolicy;
use Aesis\PermissionPolicy\Traits\Internal\AbstractHasPermissionPolicy;

trait HasPrivateResourcePolicy
{
    use AbstractHasPermissionPolicy;

    public static function getPolicy()
    {
        return PrivateResourcePolicy::class;
    }
}
