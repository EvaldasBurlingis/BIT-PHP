<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Calculator;

final class CalculatorTest extends TestCase
{
    private $calculator;
 
    protected function setUp() : void
    {
        $this->calculator = new Calculator();
    }
 
    protected function tearDown() : void
    {
        $this->calculator = NULL;
    }

    /**
     * @test
     */
    public function add()
    {

        $result = $this->calculator->add(1, 2);
        $this->assertEquals(3, $result);

        $result = $this->calculator->add(5, 2);
        $this->assertEquals(7, $result);

        $result = $this->calculator->add(100, -1);
        $this->assertEquals(99, $result);
    }
}