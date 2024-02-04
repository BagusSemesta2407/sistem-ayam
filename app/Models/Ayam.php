<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ayam extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the kandang for the Ayam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kandang(): HasMany
    {
        return $this->hasMany(Kandang::class);
    }
}
