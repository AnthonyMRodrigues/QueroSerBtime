<?php
/**
 * Created by PhpStorm.
 * User: anthonyrodrigues
 * Date: 22/11/17
 * Time: 13:15
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\CalculatingStatistics;
class CalculatingStatisticsTest extends TestCase
{
    public function start()
    {
        return new CalculatingStatistics();
    }

    public function testCalculateWithInteger()
    {
        $data['min'] = 1;
        $data['max'] = 4;
        $data['sequence'] = 4;
        $data['media'] = 2.5;
        $this->assertEquals($data, $this->start()->calculate([1,2,3,4]));
    }

    public function testCalculateWithDouble()
    {
        $data['min'] = 1.5;
        $data['max'] = 14.5;
        $data['sequence'] = 3;
        $data['media'] = 6.5333333333333341;
        $this->assertEquals($data, $this->start()->calculate([1.5,14.5,3.6]));
    }

    public function testCalculateWithIntegerAndQuote()
    {
        $data['min'] = 1;
        $data['max'] = 4;
        $data['sequence'] = 4;
        $data['media'] = 2.5;
        $this->assertEquals($data, $this->start()->calculate(['1','2','3','4']));
    }

    public function testCalculateWithDoubleAndComma()
    {
        $data['min'] = 1.0;
        $data['max'] = 4.5;
        $data['sequence'] = 4;
        $data['media'] = 2.8;
        $this->assertEquals($data, $this->start()->calculate(['1,0','2,3','3,4','4,5']));
    }

    public function testValidateNoValuePassedReturnFalse()
    {
        $this->assertFalse($this->start()->calculate([]));
    }
}
