<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CatalogRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CatalogCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CatalogCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
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
        CRUD::setModel(\App\Models\Admin\Catalog::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/catalog');
        CRUD::setEntityNameStrings('catalog', 'catalogs');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
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
        CRUD::setValidation(CatalogRequest::class);


		CRUD::addField([
			'label'     => "Url (указывать на английском, без пробеллов)",
			'type'      => 'text',
			'name'      => 'url',
		]);
		CRUD::addField([
			'label'     => "Заголовок",
			'type'      => 'text',
			'name'      => 'title',
		]);
		CRUD::addField([
			'name' => 'price',
			'label' => 'Цена',
			'type' => 'number',
			'prefix'     => "P",
			// 'suffix'     => ".00",
		]);
		CRUD::addField([
			'name' => 'old_price',
			'label' => 'Старая цена',
			'type' => 'number',
			'prefix'     => "P",
			// 'suffix'     => ".00",
		]);
		CRUD::addField([
			'name' => 'discounts',
			'label' => 'Скидка',
			'type' => 'number',
			'prefix'     => "%",
		]);
		CRUD::addField([
			'name' => 'text',
			'label' => 'Описание',
			'type' => 'tinymce',
		]);
		CRUD::addField([
			'name'      => 'preloader',
			'label'     => 'Заглушка',
			'type'      => 'upload',
			'upload'    => true,
//			'disk'      => 'uploads', // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
			// optional:
//			'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URL's this will make a URL that is valid for the number of minutes specified
		]);

		CRUD::addField([
			'name'  => 'novelty',
			'label' => 'Новинка',
			'type'  => 'checkbox'
		]);
		CRUD::addField([
			'name'  => 'exclusive',
			'label' => 'Эксклюзив',
			'type'  => 'checkbox'
		]);
		CRUD::addField([
			'name'  => 'pre_order',
			'label' => 'Предзаказ',
			'type'  => 'checkbox'
		]);
		CRUD::addField([
			'name'  => 'early_access',
			'label' => 'Ранний доступ',
			'type'  => 'checkbox'
		]);

		CRUD::addField([
			'name'      => 'img',
			'label'     => 'Картинки',
			'type'      => 'upload_multiple',
			'upload'    => true,
//			'disk'      => 'uploads', // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
//			// optional:
//			'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URL's this will make a URL that is valid for the number of minutes specified
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
