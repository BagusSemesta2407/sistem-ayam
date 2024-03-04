<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kandang extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the ayam that owns the Kandang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ayam(): BelongsTo
    {
        return $this->belongsTo(Ayam::class);
    }

    /**
     * Get all of the pengeluaranBarang for the Kandang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengeluaranBarang(): HasMany
    {
        return $this->hasMany(PengeluaranBarang::class);
    }

    /**
     * Get all of the pengeluaranInventaris for the Kandang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengeluaranInventaris(): HasMany
    {
        return $this->hasMany(PengeluaranInventaris::class);
    }

    /**
     * Get all of the pemasukanAyam for the Kandang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pemasukanAyam(): HasMany
    {
        return $this->hasMany(PemasukanAyam::class);
    }

    /**
     * Get all of the produksi for the Kandang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produksi(): HasMany
    {
        return $this->hasMany(Produksi::class);
    }

    /**
     * Get all of the pengeluaranAyam for the Kandang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengeluaranAyam(): HasMany
    {
        return $this->hasMany(PengeluaranAyam::class);
    }
}
