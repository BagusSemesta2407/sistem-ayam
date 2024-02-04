<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventaris extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the pemasukanInventaris for the Inventaris
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pemasukanInventaris(): HasMany
    {
        return $this->hasMany(PemasukanInventaris::class);
    }

    /**
     * Get all of the pengeluaranInventaris for the Inventaris
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengeluaranInventaris(): HasMany
    {
        return $this->hasMany(PengeluaranInventaris::class);
    }
}
