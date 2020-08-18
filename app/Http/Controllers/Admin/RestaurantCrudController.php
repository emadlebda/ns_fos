<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RestaurantCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RestaurantCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Restaurant::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/restaurant');
        CRUD::setEntityNameStrings('restaurant', 'restaurants');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name', // The db column name
            'label' => "Name", // Table column heading
            'type' => 'text',

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);
        $this->crud->addColumn([
            'label'=>'categories',
            'type' => "relationship",
            'name' => 'categories', // the me

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }
    protected function setupShowOperation()
    {
        $this->crud->addColumn([
            'name' => 'name', // The db column name
            'label' => "Name", // Table column heading
            'type' => 'text',

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);
        $this->crud->addColumn([
            'label'=>'categories',
            'type' => "relationship",
            'name' => 'categories', // the me

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);

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
        CRUD::setValidation(RestaurantRequest::class);

        $this->crud->addField([
            'name' => 'name', // The db column name
            'label' => "Name", // Table column heading
            'type' => 'text',

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);
        $this->crud->addField([
            // relationship
            'type' => "relationship",
            'name' => 'categories', // the method on your model that defines the relationship

            // OPTIONALS:
            // 'label' => "Category",
            // 'attribute' => "name", // foreign key attribute that is shown to user (identifiable attribute)
            // 'entity' => 'category', // the method that defines the relationship in your Model
            // 'model' => "App\Models\Category", // foreign key Eloquent model
            // 'placeholder' => "Select a category", // placeholder for the select2 input
        ]);


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
