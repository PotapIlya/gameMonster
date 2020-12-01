<?php

namespace App\Models\Admin;

use App\Models\User;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryShopping extends Model
{
	use CrudTrait;
	use HasFactory;

    protected $table = 'shopping_histories';
    protected $guarded = ['id'];


    public function users()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}

	public function catalog()
	{
		return $this->hasOne(Catalog::class, 'id', 'catalog_id');
	}

}
