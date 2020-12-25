<?php

namespace App\Models\Admin;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'news';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];


	protected $imgGroup = [
		'img_group' => 'array'
	];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

	public function category()
	{
		return $this->belongsToMany(Category::class, 'category_news', 'category_id','new_id');
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

	public function setImgAttribute($value)
	{
		$attribute_name = "img";
		$disk = "public";
		$destination_path = "news";

		$this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

		// return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
	}

	public function setImgGroupAttribute($value)
	{
		$attribute_name = "img_group";
		$disk = "public";
		$destination_path = "news";

		$this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
	}
}
