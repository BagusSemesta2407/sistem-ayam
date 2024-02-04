<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the pengeluaranBarang for the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengeluaranBarang(): HasMany
    {
        return $this->hasMany(PengeluaranBarang::class);
    }
}
