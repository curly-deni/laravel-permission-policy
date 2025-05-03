<?php

namespace Aesis\PermissionPolicy\Policies;

use Aesis\PermissionPolicy\Traits\Internal\HasOwn;

class OwnResourcePolicy extends ResourcePolicy
{
    use HasOwn;
}
