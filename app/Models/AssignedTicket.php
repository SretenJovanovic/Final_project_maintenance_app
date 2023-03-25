<?php

namespace App\Models;

use App\Models\User;
use App\Models\OpenTicket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignedTicket extends Model
{
    use HasFactory;


    public function openTicket(): BelongsTo
    {
        return $this->belongsTo(OpenTicket::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
