<?php

namespace Aesis\PermissionPolicy\Traits;

use Aesis\PermissionPolicy\Policies\OwnAndPrivateResourcePolicy;
use Aesis\PermissionPolicy\Traits\Internal\AbstractHasPermissionPolicy;

trait HasOwnAndPrivateResourcePolicy
{
    use AbstractHasPermissionPolicy;

    public static function getPolicy()
    {
        return OwnAndPrivateResourcePolicy::class;
    }
}
