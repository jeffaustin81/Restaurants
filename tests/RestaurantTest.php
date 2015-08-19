<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Restaurant.php";
    require_once "src/Cuisine.php";

    $server = 'mysql:host=localhost;dbname=restaurant_cuisine_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class RestaurantTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Restaurant::deleteAll();
            Cuisine::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $type = "Thai";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $name = "Home stuff";
            $phone = "555-456-2345";
            $address = "123 abcd street";
            $website = "http://www.helloworld.com";
            $cuisine_id = $test_Cuisine->getId();
            $test_Restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);

            $test_Restaurant->save();

            //Assert
            $result = Restaurant::getAll();
            $this->assertEquals($test_Restaurant, $result[0]);
        }
    }
?>
