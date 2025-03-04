<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'street',
        'city',
        'state',
        'postal_code',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
} 