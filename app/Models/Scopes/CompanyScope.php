<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class CompanyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        // Verifica se o usuário autenticado tem a role de 'admin'
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            return; // Não aplica o escopo, permitindo ver todos os registros
        }

        // Se o usuário não for admin, aplica o escopo para filtrar por company_id
        if (Auth::user() && Auth::user()->hasRole('company')) {
            $builder->where('company_id', Auth::user()->company_id);
        } elseif (Auth::user() && Auth::user()->hasRole('customer')) {
            $builder->where('company_id', Auth::user()->company_id);
        }
    }
}
