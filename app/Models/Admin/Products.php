<?php

namespace App\Models\Admin;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
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
	public function category()
	{
		return $this->belongsToMany(Category::class, 'category_product', 'category_id','product_id');
	}

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

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
		$destination_path = "product";

		$this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

		// return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
	}

	public function setImgAttribute($value)
	{
		$attribute_name = "img";
		$disk = "public";
		$destination_path = "product";

		$this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
	}
}
