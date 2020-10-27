<?php

namespace App\Models\Admin;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'proposals';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

	public function setImgAttribute($value)
	{
		$attribute_name = "img";
		$disk = "public";
		$destination_path = "proposal";

		$this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

		// return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
	}
	public function setMobileImgAttribute($value)
	{
		$attribute_name = "mobile_img";
		$disk = "public";
		$destination_path = "proposal";

		$this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

		// return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
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
}
