<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Panel;

class Company extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'plan_id',
        'isActive',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function plans(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasPermissionTo('access_admin');
    }
}
