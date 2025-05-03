<?php

namespace Aesis\PermissionPolicy\Traits\Internal;

trait HasOwn
{

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, $resource): bool
    {
        if (!config('permission-policy.update_check', false))
            return true;

        return $user && ($user->can($this->getPermissionPrefix() . ':update') || ($resource->user_id == $user?->id && $user->can($this->getPermissionPrefix() . ':update_own')));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, $resource): bool
    {
        if (!config('permission-policy.delete_check', false))
            return true;

        return $user && ($user->can($this->getPermissionPrefix() . ':delete') || ($resource->user_id == $user?->id && $user->can($this->getPermissionPrefix() . ':delete_own')));
    }
}
