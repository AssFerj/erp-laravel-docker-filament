<?php

namespace App\Policies;

use App\Models\Supplie;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SuppliePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view supplies');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Supplie $supplie): bool
    {
        return $user->hasPermissionTo('view supplies');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create supplies');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Supplie $supplie): bool
    {
        return $user->hasPermissionTo('edit supplies');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Supplie $supplie): bool
    {
        return $user->hasPermissionTo('delete supplies');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Supplie $supplie): bool
    {
        return $user->hasPermissionTo('restore supplies');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Supplie $supplie): bool
    {
        return $user->hasPermissionTo('force delete supplies');
    }
}
