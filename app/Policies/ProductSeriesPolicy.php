<?php

namespace App\Policies;

use App\Models\ProductSeries;
use App\Models\User;

class ProductSeriesPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProductSeries $model): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProductSeries $model): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProductSeries $model): bool
    {
        return $user->isAdmin();
    }
}
