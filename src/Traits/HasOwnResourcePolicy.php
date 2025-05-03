<?php

namespace Aesis\PermissionPolicy\Traits;

use Aesis\PermissionPolicy\Policies\OwnResourcePolicy;
use Aesis\PermissionPolicy\Traits\Internal\AbstractHasPermissionPolicy;

trait HasOwnResourcePolicy
{
    use AbstractHasPermissionPolicy;

    public static function getPolicy()
    {
        return OwnResourcePolicy::class;
    }
}
