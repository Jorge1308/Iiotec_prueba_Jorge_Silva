<?php
use PHPUnit\Framework\TestCase;
include 'App/amountToPay.php'; 

final class CalculateMountTest extends TestCase{
    
     /** @test **/
    public function check_if_file_exists()
    {
        $this->assertFileExists('./App/Datos.txt');
    }

     /** @test **/
    public function check_if_the_method_returns_a_string()
    {
        $this->assertStringMatchesFormat('%s', amountToPay::payEmployee('./App/Datos.txt'));
    }

    /** @test **/
    public function check_if_the_file_can_be_read()
    {
        $this->assertIsReadable('./App/Datos.txt');
    }
}
?>