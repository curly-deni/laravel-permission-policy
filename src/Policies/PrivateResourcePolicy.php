<?php

namespace Aesis\PermissionPolicy\Policies;

use Aesis\PermissionPolicy\Traits\Internal\HasPrivateView;

class PrivateResourcePolicy extends ResourcePolicy
{
    use HasPrivateView;
}
