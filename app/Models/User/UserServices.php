<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserServices extends Model
{
    use HasFactory;

    protected $table = 'user_services';
    protected $guarded = ['id'];

    public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}

}
