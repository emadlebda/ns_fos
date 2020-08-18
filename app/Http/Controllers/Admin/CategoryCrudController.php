<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('category', 'categories');
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
            'name' => 'img', // The db column name
            'label' => "Image", // Table column heading
            'type' => 'image',

            // OPTIONALS
            // 'prefix' => 'folder/subfolder/',
            // image from a different disk (like s3 bucket)
            // 'disk' => 'disk-name',

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);
        $this->crud->addColumn([
            'name' => 'name', // The db column name
            'label' => "Name", // Table column heading
            'type' => 'text',

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
            'name' => 'img', // The db column name
            'label' => "Image", // Table column heading
            'type' => 'image',

            // OPTIONALS
            // 'prefix' => 'folder/subfolder/',
            // image from a different disk (like s3 bucket)
            // 'disk' => 'disk-name',

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);
        $this->crud->addColumn([
            'name' => 'name', // The db column name
            'label' => "Name", // Table column heading
            'type' => 'text',

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);
    }


    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CategoryRequest::class);
        $this->crud->addField([
            'name' => 'img', // The db column name
            'label' => "Image", // Table column heading
            'type' => 'image',

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);
        $this->crud->addField([
            'name' => 'name', // The db column name
            'label' => "Name", // Table column heading
            'type' => 'text',

            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
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
