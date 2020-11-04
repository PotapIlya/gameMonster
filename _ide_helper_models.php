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
 * @property string|null $url
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\CatalogKey[] $key
 * @property-read int|null $key_count
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
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereUrl($value)
 */
	class Catalog extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\CatalogKey
 *
 * @property int $id
 * @property int|null $catalog_id
 * @property string|null $key
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin\Catalog|null $catalog
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogKey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogKey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogKey query()
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogKey whereCatalogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogKey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogKey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogKey whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogKey whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CatalogKey whereUpdatedAt($value)
 */
	class CatalogKey extends \Eloquent {}
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
 * App\Models\Admin\HistoryPayments
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $money
 * @property string|null $billId
 * @property string|null $type
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $person
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments query()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryPayments whereUserId($value)
 */
	class HistoryPayments extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Lick
 *
 * @property int $id
 * @property string|null $img
 * @property string|null $games
 * @property string|null $profit
 * @property string|null $games_form
 * @property string|null $new_price
 * @property string|null $old_price
 * @property string|null $href
 * @property string|null $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Lick newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lick newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lick query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereGames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereGamesForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereHref($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereNewPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lick whereUpdatedAt($value)
 */
	class Lick extends \Eloquent {}
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
 * App\Models\Admin\Proposal
 *
 * @property int $id
 * @property string|null $img
 * @property string|null $mobile_img
 * @property string|null $title
 * @property string|null $text
 * @property string|null $button
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereMobileImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereUpdatedAt($value)
 */
	class Proposal extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Role
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

namespace App\Models\Admin{
/**
 * App\Models\Admin\Slider
 *
 * @property int $id
 * @property string|null $url
 * @property string|null $title
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
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUrl($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Users
 *
 * @property int $id
 * @property int $role_id
 * @property string $login
 * @property string|null $img
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin\Role|null $roles
 * @method static \Illuminate\Database\Eloquent\Builder|Users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users query()
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereUpdatedAt($value)
 */
	class Users extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Test
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test query()
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Test whereUpdatedAt($value)
 */
	class Test extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property int $role_id
 * @property string $login
 * @property string|null $img
 * @property string|null $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User\UserAbout|null $about
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Catalog[] $history
 * @property-read int|null $history_count
 * @property-read \App\Models\Admin\Role|null $isAdmin
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Admin\Role|null $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\UserServices[] $services
 * @property-read int|null $services_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImg($value)
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
 * @property int $user_id
 * @property int $catalog_id
 * @property string|null $key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereCatalogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingHistory whereUserId($value)
 */
	class ShoppingHistory extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\UserAbout
 *
 * @property int $id
 * @property int $user_id
 * @property string $money
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserAbout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAbout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAbout query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAbout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAbout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAbout whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAbout whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAbout whereUserId($value)
 */
	class UserAbout extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\UserServices
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $authentication_id
 * @property string $type
 * @property string|null $login
 * @property string|null $img
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices whereAuthenticationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserServices whereUserId($value)
 */
	class UserServices extends \Eloquent {}
}

