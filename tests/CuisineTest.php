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

        function test_find()
        {
            $type = "Mexican";
            $type2 = "Italian";
            $test_Cuisine = new Cuisine($type);
            $test_Cuisine->save();
            $test_Cuisine2 = new Cuisine($type2);
            $test_Cuisine2->save();


            $result = Cuisine::find($test_Cuisine->getId());

            $this->assertEquals($test_Cuisine, $result);
        }

        function test_update()
        {
            $type = "Mexican";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $new_type = "Italian";

            $test_Cuisine->update($new_type);

            $this->assertEquals("Italian", $test_Cuisine->getType());
        }

        function test_delete()
        {
            $type = "Mexican";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $type2 = "Italian";
            $test_Cuisine2 = new Cuisine($type2, $id);
            $test_Cuisine2->save();

            $test_Cuisine->delete();

            $this->assertEquals([$test_Cuisine2], Cuisine::getAll());
        }

        function test_deleteCuisineRestaurants()
        {
            $type = "Mexican";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $name = "Por Que No";
            $phone = "555-555-5555";
            $address = "123 ABC street";
            $website = "http://www.porqueno.com";
            $cuisine_id = $test_Cuisine->getId();
            $test_Restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);
            $test_Restaurant->save();

            $test_Cuisine->delete();

            $this->assertEquals([], Restaurant::getAll());
        }
    }
 ?>
