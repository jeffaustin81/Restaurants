<?php

    class Review
    {
        private $name;
        private $id;
        private $rating;
        private $review_text;
        private $restaurant_id;

        function __construct($name, $id=null, $rating, $review_text, $restaurant_id)
        {
            $this->name = $name;
            $this->id = $id;
            $this->rating = $rating;
            $this->review_text = $review_text;
            $this->restaurant_id = $restaurant_id;
        }

        function getName()
        {
            return $this->name;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM reviews;");
        }


    }
?>
