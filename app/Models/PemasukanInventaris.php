<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PemasukanInventaris extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the inventaris that owns the PemasukanInventaris
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventaris(): BelongsTo
    {
        return $this->belongsTo(Inventaris::class);
    }
    
}