<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SliderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SliderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Admin\Slider::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/slider');
        CRUD::setEntityNameStrings('слайд', 'Слайдер');
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
			'name' => 'img', // The db column name
			'label' => "Картинка", // Table column heading
			'type' => 'image',
			 'prefix' => '/storage/',
			// optional width/height if 25px is not ok with you
			 'height' => '100px',
			 'width' => 'auto',
		]);
    	CRUD::addColumn(['name' => 'title']);
    	CRUD::addColumn(['name' => 'url']);

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
        CRUD::setValidation(SliderRequest::class);


		CRUD::addField([
			'name'      => 'img',
			'label'     => 'Картинка',
			'type'      => 'upload',
			'upload'    => true,
//			'disk'      => 'uploads', // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
			// optional:
//			'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URL's this will make a URL that is valid for the number of minutes specified
		]);

		CRUD::addField([
			'name' => 'url',
			'label' => 'Ссылка',
			'type' => 'text'
		]);

		CRUD::addField([
			'name' => 'title',
			'label' => 'Заголовок',
			'type' => 'text'
		]);

		CRUD::addField([
			'name' => 'price',
			'label' => 'Цена',
			'type' => 'currency',
		]);

		CRUD::addField([
			'name' => 'old_price',
			'label' => 'Старая цена',
			'type' => 'currency',
		]);
		CRUD::addField([
			'name' => 'discounts',
			'label' => 'Скидка',
			'type' => 'number',
			'prefix'     => "%",
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
