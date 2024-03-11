<?php

namespace JGS\Utils\Tests;

use JGS\Utils\Tools;
use PHPUnit\Framework\TestCase;

class ToolsFormatPhoneTest extends TestCase
{
    public function testShouldReturnFormattedTenNumbersPhone()
    {
        $number = '1112345678';
        $formatted_number = Tools::formatPhone($number);

        $this->assertEquals('(11) 1234-5678', $formatted_number);
    }

    public function testShouldReturnFormattedElevenNumbersPhone()
    {
        $number = '11123456789';
        $formatted_number = Tools::formatPhone($number);

        $this->assertEquals('(11) 12345-6789', $formatted_number);
    }

    public function testShouldReturnFormattedTenNumbersPhoneWithSpecialCharacters()
    {
        $number = '11.1234-5678';
        $formatted_number = Tools::formatPhone($number);

        $this->assertEquals('(11) 1234-5678', $formatted_number);
    }

    public function testShouldReturnFormattedElevenNumbersPhoneWithSpecialCharacters()
    {
        $number = '11.12345-6789';
        $formatted_number = Tools::formatPhone($number);

        $this->assertEquals('(11) 12345-6789', $formatted_number);
    }

    public function testShouldReturnFormattedTenNumbersPhoneIfInputIsTenDigitInteger()
    {
        $number = 1112345678;

        $formatted_number = Tools::formatPhone($number);
        $this->assertEquals('(11) 1234-5678', $formatted_number);
    }

    public function testShouldReturnFormattedElevenNumbersPhoneIfInputIsElevenDigitInteger()
    {
        $number = 11123456789;

        $formatted_number = Tools::formatPhone($number);
        $this->assertEquals('(11) 12345-6789', $formatted_number);
    }

    public function testShouldReturnFormattedPhoneWithCountryCodeWithTenNumbers()
    {
        $number = '551112345678';
        $formatted_number = Tools::formatPhone($number);

        $this->assertEquals('+55 (11) 1234-5678', $formatted_number);
    }

    public function testShouldReturnFormattedPhoneWithCountryCodeWithElevenNumbers()
    {
        $number = '5511123456789';
        $formatted_number = Tools::formatPhone($number);

        $this->assertEquals('+55 (11) 12345-6789', $formatted_number);
    }

    public function testShouldReturnFormattedPhoneWithCountryCodeWithSpecialCharacters()
    {
        $number = '+55 (11)1234-5678';
        $formatted_number = Tools::formatPhone($number);

        $this->assertEquals('+55 (11) 1234-5678', $formatted_number);
    }

    public function testShouldReturnFormattedPhoneWithCountryCodeWithSpecialCharactersAndElevenNumbers()
    {
        $number = '+55 (11)1234-56789';
        $formatted_number = Tools::formatPhone($number);

        $this->assertEquals('+55 (11) 12345-6789', $formatted_number);
    }

    public function testShouldReturnFormattedPhoneWithCountryCodeWithTenNumbersIfInputIsTenDigitInteger()
    {
        $number = 551112345678;

        $formatted_number = Tools::formatPhone($number);
        $this->assertEquals('+55 (11) 1234-5678', $formatted_number);
    }

    public function testShouldReturnFormattedPhoneWithCountryCodeWithElevenNumbersIfInputIsElevenDigitInteger()
    {
        $number = 5511123456789;

        $formatted_number = Tools::formatPhone($number);
        $this->assertEquals('+55 (11) 12345-6789', $formatted_number);
    }

    public function testShouldReturnTheOriginalNumberIfItIsNotValid()
    {
        $number = '123';
        $formatted_number = Tools::formatPhone($number);
        $this->assertEquals('123', $formatted_number);

        $number = '123456789012345';
        $formatted_number = Tools::formatPhone($number);
        $this->assertEquals('123456789012345', $formatted_number);

        $number = 12345;
        $formatted_number = Tools::formatPhone($number);
        $this->assertEquals(12345, $formatted_number);

        $number = '12345671223|831390123456';
        $formatted_number = Tools::formatPhone($number);
        $this->assertEquals('12345671223|831390123456', $formatted_number);
    }
}
