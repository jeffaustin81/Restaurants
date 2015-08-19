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

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants;");
        }
    }
 ?>
