<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LickRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LickCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LickCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Admin\Lick::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/lick');
        CRUD::setEntityNameStrings('lick', 'Испытай удачу');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {


		CRUD::addColumn([
			'name'      => 'img', // The db column name
			'label'     => 'Image', // Table column heading
			'type'      => 'image',
			'prefix' => '/storage/',
			// image from a different disk (like s3 bucket)
			// 'disk'   => 'disk-name',
			// optional width/height if 25px is not ok with you
			'width'  => '150px',
			'height' => '100px',
		]);


        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(LickRequest::class);



		CRUD::addField([
			'name' => 'href',
			'label' => 'Ссылка',
			'type' => 'text',
		]);

		CRUD::addField([
			'name'      => 'img',
			'label'     => 'Картинка',
			'type'      => 'upload',
			'upload'    => true,
		]);

		CRUD::addField([
			'name' => 'games',
			'label' => 'Кол-во игр',
			'type' => 'number',
		]);
		CRUD::addField([
			'name' => 'profit',
			'label' => 'Профит',
			'type' => 'number',
			'prefix' => '%'
		]);
		CRUD::addField([
			'name' => 'games_form',
			'label' => 'Игры от',
			'type' => 'number',
		]);
		CRUD::addField([
			'name' => 'new_price',
			'label' => 'Новая цена',
			'type' => 'number',
		]);
		CRUD::addField([
			'name' => 'old_price',
			'label' => 'Старая цена',
			'type' => 'number',
		]);

		CRUD::addField([
			'name' => 'discount',
			'label' => 'Скидка',
			'type' => 'number',
		]);








		CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
