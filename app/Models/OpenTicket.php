<?php

namespace App\Models;

use App\Models\User;
use App\Models\Equipement;
use App\Models\AssignedTicket;
use App\Models\TicketCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpenTicket extends Model
{
    use HasFactory;

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function equipement():BelongsTo
    {
        return $this->belongsTo(Equipement::class);
    }
    public function ticketCategory():BelongsTo
    {
        return $this->belongsTo(TicketCategory::class);
    }
    public function assignedTicket():HasOne{
        return $this->hasOne(AssignedTicket::class);
    }
}
