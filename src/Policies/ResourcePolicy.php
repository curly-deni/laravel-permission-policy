<?php

namespace Aesis\PermissionPolicy\Policies;

use Aesis\PermissionPolicy\Permissionable;

class ResourcePolicy
{
    protected string $model;

    public function __construct(string $model = '')
    {
        $this->model = $model;
    }

    protected function getPermissionPrefix()
    {

        if (is_subclass_of($this->model, Permissionable::class)) {
            return $this->model::getPermissionPrefix();
        }

        return convertClassToBaseSnake($this->model);
    }

    public function read($user): bool
    {
        if (! config('permission-policy.read_check', false)) {
            return true;
        }

        return $user && $user->can($this->getPermissionPrefix().':read');
    }

    public function viewAny($user): bool
    {
        return $this->read($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view($user, $resource): bool
    {
        return $this->viewAny($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        if (! config('permission-policy.create_check', false)) {
            return true;
        }

        return $user && $user->can($this->getPermissionPrefix().':create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, $resource): bool
    {
        if (! config('permission-policy.update_check', false)) {
            return true;
        }

        return $user && $user->can($this->getPermissionPrefix().':update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, $resource): bool
    {
        if (! config('permission-policy.delete_check', false)) {
            return true;
        }

        return $user && $user->can($this->getPermissionPrefix().':delete');
    }
}
