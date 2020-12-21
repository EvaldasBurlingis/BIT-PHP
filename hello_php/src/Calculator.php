<?php declare(strict_types = 1);

    namespace App;

    class Calculator {
        
        /**
         * @param int $a
         * @param int $b
         * @return int
         */
        public function add(int $a, int $b) : int
        {
            return $a + $b;
        }
    }
?>