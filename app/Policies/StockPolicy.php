<?php

namespace App\Policies;

use App\Models\Stock;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StockPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view stocks');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Stock $stock): bool
    {
        return $user->hasPermissionTo('view stocks');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create stocks');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Stock $stock): bool
    {
        return $user->hasPermissionTo('edit stocks');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Stock $stock): bool
    {
        return $user->hasPermissionTo('delete stocks');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Stock $stock): bool
    {
        return $user->hasPermissionTo('restore stocks');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Stock $stock): bool
    {
        return $user->hasPermissionTo('force delete stocks');
    }
}
