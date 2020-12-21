<?php declare(strict_types=1);

    
    $calculator = new BmiCalculator($_POST['gender'], (int)$_POST['age'], (int)$_POST['height'], (int)$_POST['weight']);

    $data = [
        'success' => true,
        'data' => [
            'bmi' => $calculator->getBmi(),
            'gender' => $calculator->getGender(),
            'age' => $calculator->getAge()
        ]
    ];

    echo json_encode($data);


    class BmiCalculator
    {
        private string $gender;
        private int $age;
        private int $height;
        private int $weight;
        public float $bmi;

        function __construct(string $gender, int $age, int $height, int $weight) {
            $this->gender = $gender;
            $this->age = $age;
            $this->height = $height;
            $this->weight = $weight;
        }

        private function calculateBmi()
        {
            $result = (intval($this->weight) / intval($this->height) / intval($this->height)) * 10000;
            $result = round($result, 2);

            $this->setBmi($result);
        }

        function getBmi() {

            $this->calculateBmi();

            return $this->bmi;
        }

        private function setBmi($bmi)
        {
            $this->bmi = $bmi;

            return $this;
        }

        public function getGender()
        {
            return $this->gender;
        }

        /**
         * Get the value of age
         */ 
        public function getAge()
        {
                return $this->age;
        }
    }
?>