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
            $restaurant = new Restaurant("Pok Pok", 2, "555-555-555", "123 ABC Street", "http://www.com", 2);
            $name = "Bob";
            $id = null;
            $rating = 3;
            $review_text = "Blah blah blah";
            $review_date = "2015/10/10";
            $restaurant_id = $restaurant->getId();

            $test_Review = new Review($name, $id, $rating, $review_text, $review_date, $restaurant_id);

            $result = $test_Review->getName();

            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            $restaurant = new Restaurant("Pok Pok", 2, "555-555-555", "123 ABC Street", "http://www.com", 2);
            $name = "Bob";
            $id = null;
            $rating = 3;
            $review_text = "Blah blah blah";
            $review_date = "2015/10/10";
            $restaurant_id = $restaurant->getId();

            $test_Review = new Review($name, $id, $rating, $review_text, $review_date, $restaurant_id);

            $result = $test_Review->getId();

            $this->assertEquals($id, $result);
        }

        function test_getRating()
        {
            $restaurant = new Restaurant("Pok Pok", 2, "555-555-555", "123 ABC Street", "http://www.com", 2);
            $name = "Bob";
            $id = null;
            $rating = 3;
            $review_text = "Blah blah blah";
            $review_date = "2015/10/10";
            $restaurant_id = $restaurant->getId();

            $test_Review = new Review($name, $id, $rating, $review_text, $review_date, $restaurant_id);

            $result = $test_Review->getRating();

            $this->assertEquals($rating, $result);
        }

        function test_getReviewText()
        {
            $restaurant = new Restaurant("Pok Pok", 2, "555-555-555", "123 ABC Street", "http://www.com", 2);
            $name = "Bob";
            $id = null;
            $rating = 3;
            $review_text = "Blah blah blah";
            $review_date = "2015/10/10";
            $restaurant_id = $restaurant->getId();

            $test_Review = new Review($name, $id, $rating, $review_text, $review_date, $restaurant_id);

            $result = $test_Review->getReviewText();

            $this->assertEquals($review_text, $result);
        }

        function test_getRestaurantId()
        {
            $restaurant = new Restaurant("Pok Pok", 2, "555-555-555", "123 ABC Street", "http://www.com", 2);
            $name = "Bob";
            $id = null;
            $rating = 3;
            $review_text = "Blah blah blah";
            $review_date = "2015/10/10";
            $restaurant_id = $restaurant->getId();

            $test_Review = new Review($name, $id, $rating, $review_text, $review_date, $restaurant_id);

            $result = $test_Review->getRestaurantId();

            $this->assertEquals($restaurant_id, $result);
        }

        function test_getAll()
        {
            $restaurant = new Restaurant("Pok Pok", 2, "555-555-555", "123 ABC Street", "http://www.com", 2);
            $name = "Bob";
            $id = null;
            $rating = 3;
            $review_text = "Blah blah blah";
            $review_date = "2015/10/10";
            $restaurant_id = $restaurant->getId();
            $test_Review = new Review($name, $id, $rating, $review_text, $review_date, $restaurant_id);
            $test_Review->save();

            $name2 = "John";
            $rating2 = 5;
            $review_text2 = "sdfsagasg";
            $review_date2 = "2015/10/20";
            $test_Review2 = new Review($name2, $id, $rating2, $review_text2, $review_date2, $restaurant_id);
            $test_Review2->save();

            $result = Review::getAll();

            $this->assertEquals([$test_Review, $test_Review2], $result);
        }

        function test_save()
        {
            $restaurant = new Restaurant("Pok Pok", 2, "5", "1", "website", 2);
            $name = "Bob";
            $id = null;
            $rating = 3;
            $review_text = "B";
            $review_date = "2015-10-10";
            $restaurant_id = $restaurant->getId();

            $test_Review = new Review($name, $id, $rating, $review_text, $review_date, $restaurant_id);
            $test_Review->save();
            $result = Review::getAll();
            $this->assertEquals($test_Review, $result[0]);
        }

    }
?>
