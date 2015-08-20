<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Cuisine.php";
    require_once "src/Restaurant.php";
    require_once "src/Review.php";

    $server = 'mysql:host=localhost;dbname=restaurant_cuisine_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ReviewTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Cuisine::deleteAll();
            Restaurant::deleteAll();
            Review::deleteAll();
        }

        function test_getName()
        {
            $restaurant = new Restaurant("Pok Pok", $id=null, "555-555-555", "123 ABC Street", "http://www.com", 2);
            $name = "Bob";
            $id = null;
            $rating = 3;
            $review_text = "Blah blah blah";
            $restaurant_id = $restaurant->getId();

            $test_Review = new Review($name, $id, $rating, $review_text, $restaurant_id);

            $result = $test_Review->getName();

            $this->assertEquals($name, $result);
        }


    }
?>
