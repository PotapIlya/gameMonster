<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Admin{
/**
 * App\Models\Admin\Catalog
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $price
 * @property string|null $old_price
 * @property string|null $discounts
 * @property string|null $preloader
 * @property array|null $img
 * @property string|null $text
 * @property int $novelty
 * @property int $exclusive
 * @property int $pre_order
 * @property int $early_access
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Category[] $category
 * @property-read int|null $category_count
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereDiscounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereEarlyAccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereExclusive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereNovelty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog wherePreOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog wherePreloader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereUpdatedAt($value)
 */
	class Catalog extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Category
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Catalog[] $catalog
 * @property-read int|null $catalog_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Nav
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Nav newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nav newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nav query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nav whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nav whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nav whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nav whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nav whereUrl($value)
 */
	class Nav extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\News
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $img
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Category[] $category
 * @property-read int|null $category_count
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 */
	class News extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Slider
 *
 * @property int $id
 * @property string|null $price
 * @property string|null $old_price
 * @property string|null $discounts
 * @property string|null $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDiscounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property int $role_id
 * @property string $login
 * @property string $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\ShoppingHistory
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereUpdatedAt($value)
 */
	class ShoppingHistory extends \Eloquent {}
}

