<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
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
        CRUD::setModel(\App\Models\Admin\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('новость', 'Новости');
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
			'name' => 'title',
			'label' => 'Заголовок'
		]);

		CRUD::addColumn([
			'name' => 'img', // The db column name
			'label' => "Картинка", // Table column heading
			'type' => 'image',
			'prefix' => '/storage/',
			// optional width/height if 25px is not ok with you
			'height' => '80px',
			'width' => '80px',
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
        CRUD::setValidation(NewsRequest::class);

		CRUD::addField([
			'name'            => 'url',
			'label'           => "Url",
			'type'            => 'news.createUrlHidden',
		]);
		CRUD::addField([
			'name'            => 'title',
			'label'           => "Заголовок",
			'type'            => 'news.createUrl',
		]);



		CRUD::addField([
			'label'     => "Категории",
			'type'      => 'select2_multiple',
			'name'      => 'category', // the method that defines the relationship in your Model

			// optional
			'entity'    => 'category', // the method that defines the relationship in your Model
			'model'     => "App\Models\Admin\Category", // foreign key model
			'attribute' => 'name', // foreign key attribute that is shown to user
			'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
			// 'select_all' => true, // show Select All and Clear buttons?
		]);

		CRUD::addField([
			'name' => 'subTitle',
			'label' => 'Название',
			'type' => 'translateText',
		]);


		CRUD::addField([
			'name' => 'text_1',
			'label' => 'Текст',
			'type' => 'translateTextarea',
		]);


		CRUD::addField([
			'name'      => 'img',
			'label'     => 'Картинка',
			'type'      => 'upload',
			'upload'    => true,
		]);

		CRUD::addField([
			'name' => 'text_2',
			'label' => 'Текст',
			'type' => 'translateTextarea',
		]);


		CRUD::addField([
			'name'            => 'list',
			'label'           => 'Список',
			'type'            => 'table',
			'entity_singular' => 'option', // used on the "Add X" button
			'columns'         => [
				'name'  => 'Список',
			],
//			'max' => 5, // maximum rows allowed in the table
			'min' => 0, // minimum rows allowed in the table
		]);

		CRUD::addField([
			'name'      => 'img_group',
			'label'     => 'Photos',
			'type'      => 'upload_multiple',
			'upload'    => true,
			'temporary' => 10
		]);


		CRUD::addField([
			'name' => 'text_3',
			'label' => 'Текст',
			'type' => 'translateTextarea',
		]);

		CRUD::addField([
			'name' => 'created_at',
			'label' => 'Дата создания',
			'type' => 'date'
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
