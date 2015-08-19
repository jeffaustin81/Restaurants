<?php

    class Restaurant
    {
        private $name;
        private $id;
        private $phone;
        private $address;
        private $website;
        private $cuisine_id;

        function __construct($name, $id=null, $phone, $address, $website, $cuisine_id)
        {
            $this->name = $name;
            $this->id = $id;
            $this->phone = $phone;
            $this->address = $address;
            $this->website = $website;
            $this->cuisine_id = $cuisine_id;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function getAddress()
        {
            return $this->address;
        }

        function getWebsite()
        {
            return $this->website;
        }

        function getCuisineId()
        {
            return $this->cuisine_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO restaurants (name, phone, address, website, cuisine_id) VALUES ('{$this->getName()}', '{$this->getPhone()}', '{$this->getAddress()}', '{$this->getWebsite()}', {$this->getCuisineId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants ORDER BY name;");
            $restaurants = array();
            foreach($returned_restaurants as $restaurant)
            {
                $name = $restaurant['name'];
                $id = $restaurant['id'];
                $phone = $restaurant['phone'];
                $address = $restaurant['address'];
                $website = $restaurant['website'];
                $cuisine_id = $restaurant['cuisine_id'];
                $new_restaurant = new Restaurant($name, $id, $phone, $address, $website, $cuisine_id);
                array_push($restaurants, $new_restaurant);
            }
            return $restaurants;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants;");
        }
    }
 ?>
