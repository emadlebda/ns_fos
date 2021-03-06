<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        CRUD::addColumn(
            [
                'name' => 'user', // name of relationship method in the model
                'type' => 'relationship',
                'label' => 'User', // Table column heading
                // OPTIONAL
                'entity' => 'user', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => User::class, // foreign key model
            ]
        );
        CRUD::addColumn(['name' => 'restaurant', 'type' => 'relationship', 'label' => 'restaurant']);
        CRUD::addColumn(['name' => 'user', 'type' => 'relationship', 'label' => 'user']);
        CRUD::addColumn(['name' => 'product', 'type' => 'relationship', 'label' => 'product']);
        CRUD::addColumn(['name' => 'price', 'type' => 'number']);
        CRUD::addColumn(['name' => 'quantity', 'type' => 'number']);


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);


        // CRUD::setFromDb(); // columns
        CRUD::addColumn(
            [
                'name' => 'user', // name of relationship method in the model
                'type' => 'relationship',
                'label' => 'User', // Table column heading
                // OPTIONAL
                'entity' => 'user', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => User::class, // foreign key model
            ]
        );
        CRUD::addColumn(['name' => 'restaurant', 'type' => 'relationship', 'label' => 'restaurant']);
        CRUD::addColumn(['name' => 'product', 'type' => 'relationship', 'label' => 'product']);
        CRUD::addColumn(['name' => 'price', 'type' => 'number']);
        CRUD::addColumn(['name' => 'quantity', 'type' => 'number']);

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderRequest::class);

        //CRUD::setFromDb(); // fields
        CRUD::addField(
            [  // Select
                'label' => "User",
                'type' => 'select',
                'name' => 'user_id', // the db column for the foreign key
                'entity' => 'user', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
            ]
        );
        CRUD::addField(
            [  // Select
                'label' => "restaurant",
                'type' => 'select',
                'name' => 'restaurant_id', // the db column for the foreign key
                'entity' => 'restaurant', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
            ]
        );
        CRUD::addField(
            [  // Select
                'type' => "relationship",
                'name' => 'product',
            ]
        );
        CRUD::addField(['name' => 'quantity', 'type' => 'number']);
//        $this->crud->create([
//            'price'=>50.0,
//            'user_id'=>1,
//            'restaurant_id'=>1,
//            'quantity'=>1,
//        ]);
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
