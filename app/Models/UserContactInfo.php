<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserContactInfo extends Model
{
    use HasFactory;

    public function profile(): HasMany
    {
        return $this->hasMany(Profile::class);
    }
}
