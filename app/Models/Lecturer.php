<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Lecturer extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;


    protected $fillable = [
        'nidn',
        'name',
        'username',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
