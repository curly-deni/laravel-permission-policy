<?php

namespace Aesis\PermissionPolicy\Traits;

use Aesis\PermissionPolicy\Policies\ResourcePolicy;
use Aesis\PermissionPolicy\Traits\Internal\AbstractHasPermissionPolicy;

trait HasResourcePolicy
{
    use AbstractHasPermissionPolicy;

    public static function getPolicy()
    {
        return ResourcePolicy::class;
    }
}
