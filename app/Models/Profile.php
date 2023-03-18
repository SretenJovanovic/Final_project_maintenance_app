<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function isAdmin()
    {
        return $this->role_id == 1;
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
