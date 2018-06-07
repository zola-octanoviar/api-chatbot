<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

/**
 * @category        Product
 * @author          Zola
 */
class Product extends \Restserver\Libraries\REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function rate_get()
    {
        // Users from a data store e.g. database
        $products = [
            ['id' => 1, 'name' => 'motor bekas', 'rate' => '5%'],
            ['id' => 2, 'name' => 'motor baru', 'rate' => '6%'],
            ['id' => 3, 'name' => 'mobil bekas', 'rate' => '7%'],
            ['id' => 4, 'name' => 'mobil baru', 'rate' => '8%'],
            ['id' => 5, 'name' => 'smartphone', 'rate' => '2%'],
            ['id' => 6, 'name' => 'laptop', 'rate' => '2.5%'],
            ['id' => 7, 'name' => 'multiguna', 'rate' => '2.5%'],
        ];

        $id = $this->get('id');
        $name = $this->get('name');

        // If the id parameter doesn't exist return all the Products
        if ($id === NULL && $name === NULL )
        {
            // Check if the Products data store contains Products (in case the database result returns NULL)
            if ($products)
            {
                // Set the response and exit
                $this->response($products, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Products were found'
                ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, \Restserver\Libraries\REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.

            $result = NULL;
            if (!empty($products))
            {
                foreach ($products as $key => $value)
                {
                    if (isset($value['id']) && $value['id'] === $id)
                    {
                        $result = $value;
                    }
                    if (isset($value['name']) && strpos($value['name'],$name) !== false)
                    {
                        $result = $value;
                    }
                }
            }

            if (!empty($result))
            {
                $this->set_response($result, \Restserver\Libraries\REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Products could not be found for ' . $name 
                ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }
}
