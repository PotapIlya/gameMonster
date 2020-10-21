<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAbout extends Model
{
    use HasFactory;

    protected $table = 'user_abouts';
    protected $guarded = ['id'];

}
