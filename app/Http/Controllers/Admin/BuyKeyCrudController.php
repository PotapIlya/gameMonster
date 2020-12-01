<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BuyKeyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BuyKeyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BuyKeyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Admin\HistoryShopping::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/buykey');
        CRUD::setEntityNameStrings('buykey', 'Покупки');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

    	CRUD::addColumn(['name' => 'id']);

    	CRUD::addColumn([
			'label'     => 'Пользователь', // Table column heading
			'type'      => 'select',
			'name'      => 'users', // the column that contains the ID of that connected entity;
			'entity'    => 'users', // the method that defines the relationship in your Model
			'attribute' => 'login', // foreign key attribute that is shown to user
//			'model'     => "App\Models\Category", // foreign key model
		]);

		CRUD::addColumn([
			'label'     => 'Товар', // Table column heading
			'type'      => 'select',
			'name'      => 'catalog', // the column that contains the ID of that connected entity;
			'entity'    => 'catalog', // the method that defines the relationship in your Model
			'attribute' => 'title', // foreign key attribute that is shown to user
//			'model'     => "App\Models\Category", // foreign key model
		]);

//        CRUD::setFromDb(); // columns

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
        CRUD::setValidation(BuyKeyRequest::class);

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
