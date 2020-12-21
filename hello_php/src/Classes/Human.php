<?php declare(strict_types = 1);

namespace App\Classes;


    class Human{
        
        private $name;
        private $age;

        /**
         * Get the value of name
         */ 
        public function getName() : String
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName(String $name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of age
         */ 
        public function getAge() : int
        {
                return $this->age;
        }

        /**
         * Set the value of age
         *
         * @return  self
         */ 
        public function setAge(int $age)
        {
                $this->age = $age;

                return $this;
        }
    }
?>
