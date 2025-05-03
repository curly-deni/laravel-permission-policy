<?php

namespace Aesis\PermissionPolicy\Traits\Internal;

trait HasPrivateView
{

    public function viewPrivate($user): bool
    {
        if (! config('permission-policy.view_check', false)) {
            return true;
        }

        return $user && $user->can($this->getPermissionPrefix().':private_view');
    }

    public function viewAny($user): bool
    {
        if (! config('permission-policy.view_check', false)) {
            return true;
        }

        return $user && $this->read($user) && ($user->can($this->getPermissionPrefix().':private_view') || $user->can($this->getPermissionPrefix().':own_read'));
    }

    public function view($user, $resource): bool
    {
        if (! config('permission-policy.view_check', false)) {
            return true;
        }

        return $this->read($user) && ($resource->public || ($user && $user->can($this->getPermissionPrefix().':private_view')));
    }
}
