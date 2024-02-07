<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengeluaranAyam extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the pemasukanAyam that owns the PengeluaranAyam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pemasukanAyam(): BelongsTo
    {
        return $this->belongsTo(PemasukanAyam::class);
    }
}
