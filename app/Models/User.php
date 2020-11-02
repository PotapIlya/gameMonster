<?php

namespace App\Models;

use App\Models\Admin\Catalog;
use App\Models\Admin\Role;
use App\Models\User\ShoppingHistory;
use Backpack\CRUD\app\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'login',
//        'email',
//        'phone',
//        'password',
//		'authentication_id'
//    ];

	protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        'password',
//        'remember_token',
//    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



	/**
	 * Отправка уведомления о сбросе пароля.
	 *
	 * @param  string  $token
	 * @return void
	 */
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetPasswordNotification($token));
	}



	/** FUNCTIONS */

	public function about()
	{
		return $this->hasOne(User\UserAbout::class, 'user_id', 'id');
	}
	public function services()
	{
		return $this->hasMany(User\UserServices::class, 'user_id', 'id');
	}

	public function history()
	{
		return $this->belongsToMany(Catalog::class, 'shopping_histories', 'user_id', 'catalog_id');
	}

	public function roles()
	{
		return $this->hasOne(Role::class, 'id', 'role_id');
	}

	public function isAdmin()
	{
//		$user->roles()->where('name', 'admin')->exists()
		return $this->hasOne(Role::class, 'id', 'role_id')->where('name', 'admin');
	}


}
