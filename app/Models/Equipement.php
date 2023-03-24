<?php

namespace App\Models;

use App\Models\Section;
use App\Models\OpenTicket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manufacturer',
        'model',
        'section',
        'serial',
        'description',
        'status',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
    public function openTicket():HasMany
    {
        return $this->hasMany(OpenTicket::class);
    }
}
