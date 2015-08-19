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

            $name = "Pok Pok";
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

        function test_getName()
        {
            $type = "Thai";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $name = "Pok Pok";
            $phone = "555-456-2345";
            $address = "123 abcd street";
            $website = "http://www.helloworld.com";
            $cuisine_id = $test_Cuisine->getId();
            $test_Restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);

            $result = $test_Restaurant->getName();

            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            $type = "Thai";
            $id = 1;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $name = "Pok Pok";
            $phone = "555-456-2345";
            $address = "123 abcd street";
            $website = "http://www.helloworld.com";
            $cuisine_id = $test_Cuisine->getId();
            $test_Restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);

            $result = $test_Restaurant->getId();

            $this->assertEquals(true, is_numeric($result));
        }

        function test_getPhone()
        {
            $type = "Thai";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $name = "Pok Pok";
            $phone = "555-456-2345";
            $address = "123 abcd street";
            $website = "http://www.helloworld.com";
            $cuisine_id = $test_Cuisine->getId();
            $test_Restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);

            $result = $test_Restaurant->getPhone();

            $this->assertEquals($phone, $result);
        }

        function test_getAddress()
        {
            $type = "Thai";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $name = "Pok Pok";
            $phone = "555-456-2345";
            $address = "123 abcd street";
            $website = "http://www.helloworld.com";
            $cuisine_id = $test_Cuisine->getId();
            $test_Restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);

            $result = $test_Restaurant->getAddress();

            $this->assertEquals($address, $result);
        }

        function test_getWebsite()
        {
            $type = "Thai";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $name = "Pok Pok";
            $phone = "555-456-2345";
            $address = "123 abcd street";
            $website = "http://www.helloworld.com";
            $cuisine_id = $test_Cuisine->getId();
            $test_Restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);

            $result = $test_Restaurant->getWebsite();

            $this->assertEquals($website, $result);
        }

        function test_getCuisineId()
        {
            $type = "Thai";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $name = "Pok Pok";
            $phone = "555-456-2345";
            $address = "123 abcd street";
            $website = "http://www.helloworld.com";
            $cuisine_id = $test_Cuisine->getId();
            $test_Restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);

            $result = $test_Restaurant->getCuisineId();

            $this->assertEquals($cuisine_id, $result);
        }

        function test_update()
        {
            $type = "Thai";
            $id = null;
            $test_Cuisine = new Cuisine($type, $id);
            $test_Cuisine->save();

            $type2 = "Bar";
            $id = null;
            $test_Cuisine2 = new Cuisine($type2, $id);
            $test_Cuisine2->save();

            $name = "Pok Pok";
            $phone = "555-456-2345";
            $address = "123 abcd street";
            $website = "http://www.helloworld.com";
            $cuisine_id = $test_Cuisine->getId();
            $test_Restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);

            $new_name = "Whiskey Soda Lounge";
            $new_phone = "555-555-5555";
            $new_address = "678 DEF street";
            $new_website = "http://www.pokpok.com";
            $new_cuisine_id = $test_Cuisine2->getId();
            $new_Restaurant = new Restaurant($new_name, $id, $new_phone, $new_address, $new_website, $new_cuisine_id);

            $test_Restaurant->update($new_name, $id, $new_phone, $new_address, $new_website, $new_cuisine_id);

            $this->assertEquals($new_Restaurant, $test_Restaurant);
        }
    }
?>
