<?php

namespace App\Models\Admin;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'catalogs';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

	protected $casts = [
		'img' => 'array'
	];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/


	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

	public function category()
	{
		return $this->belongsToMany(Category::class, 'category_product', 'category_id','product_id');
	}
	public function languages()
	{
		return $this->belongsToMany(Languages::class, 'catalog_languages', 'catalog_id','language_id');
	}
	public function operatingSystem()
	{
		return $this->belongsToMany(OperatingSystem::class, 'catalog_operating_system', 'catalog_id','operating_system');
	}

	public function key()
	{
		return $this->hasMany(CatalogKey::class, 'catalog_id', 'id');
	}

	public function developer()
	{
		return $this->hasOne(Developers::class, 'id', 'developers_id');
	}

//	public function allKey()
//	{
//		return $this->hasOne(CatalogKey::class, 'catalog_id', 'id');
//	}

	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| ACCESSORS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
	public function setPreloaderAttribute($value)
	{
		$attribute_name = "preloader";
		$disk = "public";
		$destination_path = "catalog";

		$this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

		// return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
	}

	public function setImgAttribute($value)
	{
		$attribute_name = "img";
		$disk = "public";
		$destination_path = "catalog";

		$this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
	}
}
