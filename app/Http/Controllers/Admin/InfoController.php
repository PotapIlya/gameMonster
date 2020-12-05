<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Catalog;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Http\Request;

class InfoController extends CrudController
{

	public function widgets()
	{
		Widget::add([
			'type'    => 'div',
			'class'   => 'row',
			'content' => [
				[
					'type'        => 'progress',
					'class'       => 'w-100 card text-white bg-info mb-2',
					'value'       => User::count(),
					'description' => 'Зарегистрированных пользователей',
					'progress'    => 50, // integer
//					'hint'        => '8544 more until next milestone.',
					'wrapper' => [
						'class' => 'col-sm-6',
					]
				],
				[
					'type'        => 'progress',
					'class'       => 'w-100 card text-white bg-dark mb-2',
					'value'       => Catalog::count(),
					'description' => 'Кол-во товаров',
					'progress'    => 50, // integer
//					'hint'        => '8544 more until next milestone.',
					'wrapper' => [
						'class' => 'col-sm-6',
					]
				],
			],

		]);


//		Widget::add([
//			'type'       => 'chart',
//			'controller' => \App\Http\Controllers\Admin\Charts\WeeklyUsersChartController::class,
//
//			// OPTIONALS
//
//			 'class'   => 'card mb-2',
//			 'wrapper' => ['class'=> 'col-md-6 pl-0'],
//			 'content' => [
//				 'header' => 'Ключи',
//			 ],
//
//		]);

		return view(backpack_view('blank'));
	}
}
