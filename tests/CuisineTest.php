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

        function test_save()
        {
            // Arrange
            $type = "Mexican";
            $test_Cuisine = new Cuisine($type);
            $test_Cuisine->save();

            // Act
            $result = Cuisine::getAll();

            // Assert
            $this->assertEquals($test_Cuisine, $result[0]);
        }

        function test_getAll()
        {
            $type = "Mexican";
            $type2 = "Italian";
            $test_Cuisine = new Cuisine($type);
            $test_Cuisine->save();
            $test_Cuisine2 = new Cuisine($type2);
            $test_Cuisine2->save();

            $result = Cuisine::getAll();

            $this->assertEquals([$test_Cuisine, $test_Cuisine2], $result);
        }

        function test_deleteAll()
        {
            $type = "Mexican";
            $type2 = "Italian";
            $test_Cuisine = new Cuisine($type);
            $test_Cuisine->save();
            $test_Cuisine2 = new Cuisine($type2);
            $test_Cuisine2->save();

            Cuisine::deleteAll();
            $result = Cuisine::getAll();

            $this->assertEquals([], $result);
        }
    }
 ?>
