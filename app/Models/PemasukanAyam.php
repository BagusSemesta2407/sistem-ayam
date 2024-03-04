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

    public function scopeFilter($q, $filter)
    {
        $q->when($filter->kandang_id ?? false, fn ($q, $kandangId) => $q->where('kandang_id', $kandangId));
        $q->when($filter->startDate ?? false, fn ($q, $startDate) => $q->where('tanggal_masuk', '>=', $startDate));
        $q->when($filter->endDate ?? false, fn ($q, $endDate) => $q->where('tanggal_masuk', '<=', $endDate));
    }
}
