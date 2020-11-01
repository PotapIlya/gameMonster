<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsersRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UsersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UsersCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Admin\Users::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/users');
        CRUD::setEntityNameStrings('пользователя', 'Пользователи');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
//        CRUD::setFromDb(); // columns

		CRUD::addColumn(['name' => 'id']);
		CRUD::addColumn([
			'label'     => 'Роли', // Table column heading
			'type'      => 'select',
			'name'      => 'role_id', // the column that contains the ID of that connected entity;
			'entity'    => 'roles', // the method that defines the relationship in your Model
			'attribute' => 'name', // foreign key attribute that is shown to user
			'model'     => "App\Models\Admin\Roles", // foreign key model
		]);
		CRUD::addColumn(['name' => 'login']);
		CRUD::addColumn(['name' => 'email']);
		CRUD::addColumn(['name' => 'phone']);

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
        CRUD::setValidation(UsersRequest::class);



        CRUD::addField([
			'label'     => "Роли",
			'type'      => 'select2',
			'name'      => 'role_id', // the db column for the foreign key

			// optional
			'entity'    => 'roles', // the method that defines the relationship in your Model
			'model'     => "App\Models\Admin\Role", // foreign key model
			'attribute' => 'name', // foreign key attribute that is shown to user
//			'default'   => 2, // set the default value of the select2
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
