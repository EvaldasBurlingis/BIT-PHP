<?php declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use Codedungeon\PHPCliColors\Color;


    function print_headline(String $headline) : void 
    {
        echo Color::BLUE, $headline, Color::RESET . PHP_EOL;
    }

    function print_footer() : void 
    {
        echo "\n" . PHP_EOL;
    }

    /**
     * ------------------------
     * 1.1 Vienmatis masyvas
     * ------------------------
     */

    
    print_headline('1.1 VIENMATIS MASYVAS');

    $numbers = [5, 7, 9, 10, 5, 14];
    sort($numbers);

    foreach ($numbers as $number) {
        echo $number . ' ';
    }

    print_footer();

    /**
     * ------------------------
     * 1.2 Asociatyvus masyvas
     * ------------------------
     */

    print_headline('1.2 ASOCIATYVUS MASYVAS');

    $user = ['name' => 'John', 'lastname' => 'Doe', 'age' => 35];

    echo $user['name'] . ' ' . $user['lastname'] . ' is ' . $user['age'] . PHP_EOL;

    print_footer();

    /**
     * ------------------------
     * 1.3 Asociatyvus masyvas
     * ------------------------
     */

    print_headline('1.3 DAUGIAMATIS MASYVAS');

    $people = [
        ['name' => 'John', 'lastname' => 'Doe', 'age' => 35],
        ['name' => 'Jane', 'lastname' => 'Doe', 'age' => 32],
        ['name' => 'Peter', 'lastname' => 'Peterson', 'age' => 17],
        ['name' => 'Simon', 'lastname' => 'Simpson', 'age' => 48]
    ];

    foreach ($people as $p) {
        echo $p['name'] . ' ' . $p['lastname'] . ' is ' . $p['age'] . PHP_EOL;
    }

    print_footer();

    /**
     * ------------------------
     * 2. Žmonių masyvas
     * ------------------------
     */

    $people_list = Array(
       ['name' => 'Jonas', 'weight' => 84],
       ['name' => 'Ana', 'weight' => 62], 
       ['name' => 'Rokas', 'weight' => 94], 
       ['name' => 'Simona', 'weight' => 72], 
       ['name' => 'Vilma', 'weight' => 68], 
    );

    /**
     * ------------------------
     * 2.1 Lengviausias žmogus
     * ------------------------
     */

    print_headline('2.1 LENGVIAUSIAS ŽMOGUS');

    usort($people_list, function($a, $b) {
        return $a['weight'] <=> $b['weight'];
    });

    echo 'Lengviausias žmogus: ' . $people_list[0]['name'] . '. Jo/s svoris yra ' . $people_list[0]['weight'] . PHP_EOL;

    print_footer();

    /**
     * ------------------------
     * 2.2 Sunkiausias žmogus
     * ------------------------
     */
    print_headline('2.2 SUNKIAUSIAS ŽMOGUS');

    usort($people_list, function($a, $b) {
        return $b['weight'] <=> $a['weight'];
    });

    echo 'Sunkiausias žmogus: ' . $people_list[0]['name'] . '. Jo/s svoris yra ' . $people_list[0]['weight'] . PHP_EOL;

    print_footer();

    /**
     * ------------------------
     * 2.3 Visų žmonių svoris
     * ------------------------
     */

    print_headline('2.2 VISŲ ŽMONIŲ SVORIS');

    $total_weight = 0;

    foreach ($people_list as $person) {
        $total_weight += $person['weight'];
    }

    if ($total_weight > 500) echo 'Bendras svoris yra : ' . $total_weight . 'kg.' . Color::RED, ' LIFTU KILTI DRAUDŽIAMA' , Color::RESET . PHP_EOL;
    if ($total_weight < 500) echo 'Bendras svoris yra : ' . $total_weight . 'kg.' . Color::GREEN,  ' LIFTU KILTI LEIDŽIAMA', Color::RESET  . PHP_EOL;

    print_footer();

    /**
     * ------------------------
     * 2.3 Surikiuoti žmones pagal svorį
     * ------------------------
     */

    print_headline('2.2 SURIKIUOTI ŽMONĖS PAGAL SVORĮ');

    usort($people_list, function($a, $b) {
        return $a['weight'] <=> $b['weight'];
    });

    foreach ($people_list as $person) {
       echo $person['name'] . ' ' . $person['weight'] . PHP_EOL;
    }
?>