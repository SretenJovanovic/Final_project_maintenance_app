<?php

namespace App\Models;

use App\Models\Equipement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    public function equipement(): HasMany
    {
        return $this->hasMany(Equipement::class);
    }
}
