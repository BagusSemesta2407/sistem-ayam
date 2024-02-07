<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PemasukanAyam extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the kandang that owns the PemasukanAyam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kandang(): BelongsTo
    {
        return $this->belongsTo(Kandang::class);
    }

    /**
     * Get all of the pengeluaranAyam for the PemasukanAyam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengeluaranAyam(): HasMany
    {
        return $this->hasMany(PengeluaranAyam::class);
    }
}
