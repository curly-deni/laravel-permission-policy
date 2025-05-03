<?php

namespace Aesis\PermissionPolicy\Policies;

use Aesis\PermissionPolicy\Traits\Internal\HasOwn;
use Aesis\PermissionPolicy\Traits\Internal\HasPrivateView;

class OwnAndPrivateResourcePolicy extends ResourcePolicy
{
    use HasOwn, HasPrivateView;
}
