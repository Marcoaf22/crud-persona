<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'per_nombre',
        'per_appm',
        'per_prof',
        'per_telf',
        'per_cel',
        'per_email',
        'per_dir',
        'per_fnac',
        'per_lnac',
        'per_estado',
        'per_content',
        'published_at',
        'total',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'per_fnac' => 'date',
        'per_estado' => 'boolean',
        'published_at' => 'timestamp',
        'total' => 'decimal:2',
    ];
}
