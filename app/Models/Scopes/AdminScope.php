<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AdminScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $admin = auth()->guard('admin')->user();

        if ($admin) {
            if ($admin->isSuperAdmin()) {
                // Super Admin: No filtering, show all users
                $builder;
            } else {
                $builder->where('mahall', $admin->id);
            }
        } else {
            $builder;
        }
    }
}
