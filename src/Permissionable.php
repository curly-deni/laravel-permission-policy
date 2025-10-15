<?php

namespace Aesis\PermissionPolicy;

interface Permissionable
{
    public static function getPermissionPrefix(): static;
}
