<?php

namespace Tests\Unit;

use App\Helper\MathHelper;
use PHPUnit\Framework\TestCase;

class MathPowerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_normal()
    {
        $hasil = MathHelper::pangkat(2, 3);
        $this->assertEquals(8, $hasil);
    }

    public function test_bilangan_negatif()
    {
        $hasil = MathHelper::pangkat(-2, 3);
        $this->assertEquals(-8, $hasil);
    }

    public function test_pangkat_negatif()
    {
        $hasil = MathHelper::pangkat(2, -3);
        $this->assertEquals(0, $hasil);
    }
}
