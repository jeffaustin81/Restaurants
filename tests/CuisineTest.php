<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Cuisine.php";
    require_once "src/Restaurant.php";

    $server = 'mysql:host=localhost;dbname=restaurant_cuisine_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CuisineTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Cuisine::deleteAll();
            Restaurant::deleteAll();
        }

        function test_getType()
        {
            $type = "Mexican";
            $test_Cuisine = new Cuisine($type);

            $result = $test_Cuisine->getType();

            $this->assertEquals($type, $result);
        }

        function test_getId()
        {
            $type = "Mexican";
            $id = 1;
            $test_Cuisine = new Cuisine($type, $id);

            $result = $test_Cuisine->getId();

            $this->assertEquals(true, is_numeric($result));
        }
    }
 ?>
