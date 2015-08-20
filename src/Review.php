<?php

    class Review
    {
        private $name;
        private $id;
        private $rating;
        private $review_text;
        private $review_date;
        private $restaurant_id;

        function __construct($name, $id = null, $rating, $review_text, $review_date, $restaurant_id)
        {
            $this->name = $name;
            $this->id = $id;
            $this->rating = $rating;
            $this->review_text = $review_text;
            $this->review_date = $review_date;
            $this->restaurant_id = $restaurant_id;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function getRating()
        {
            return $this->rating;
        }

        function getReviewText()
        {
            return $this->review_text;
        }

        function getReviewDate()
        {
            return $this->review_date;
        }

        function getRestaurantId()
        {
            return $this->restaurant_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO reviews (name, rating, review_text, review_date, restaurant_id) VALUES ('{$this->getName()}', {$this->getRating()}, '{$this->getReviewText()}', '{$this->getReviewDate()}', {$this->getRestaurantId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_reviews = $GLOBALS['DB']->query("SELECT * FROM reviews ORDER BY review_date;");
            $reviews = array();
            foreach($returned_reviews as $review)
            {
                $name = $review['name'];
                $id = $review['id'];
                $rating = $review['rating'];
                $review_text = $review['review_text'];
                $review_date = $review['review_date'];
                $restaurant_id = $review['restaurant_id'];
                $new_review = new Review($name, $id, $rating, $review_text, $review_date, $restaurant_id);
                array_push($reviews, $new_review);
            }
            return $reviews;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM reviews;");
        }


    }
?>
