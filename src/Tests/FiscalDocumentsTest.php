<?php

namespace JGS\Utils\Tests;

use JGS\Utils\FiscalDocuments;
use PHPUnit\Framework\TestCase;

class FiscalDocumentsTest extends TestCase
{
    public function testShouldBeValidWhenIsAValidStringCPF()
    {
        $cpf_string = new FiscalDocuments('12345678909');

        $this->assertTrue($cpf_string->isValid());
        $this->assertFalse($cpf_string->isInvalid());
    }

    public function testShouldBeValidWhenIsAValidIntegerCPF()
    {
        $cpf_int = new FiscalDocuments(12345678909);

        $this->assertTrue($cpf_int->isValid());
        $this->assertFalse($cpf_int->isInvalid());
    }

    public function testShouldBeValidWhenIsAValidFormattedCPF()
    {
        $cpf_formatted = new FiscalDocuments('123.456.789-09');

        $this->assertTrue($cpf_formatted->isValid());
        $this->assertFalse($cpf_formatted->isInvalid());
    }

    public function testShouldBeInvalidWhenIsAnInvalidStringCPF()
    {
        $cpf_string = new FiscalDocuments('12345678900');

        $this->assertFalse($cpf_string->isValid());
        $this->assertTrue($cpf_string->isInvalid());
    }

    public function testShouldBeInvalidWhenIsAnInvalidIntegerCPF()
    {
        $cpf_int = new FiscalDocuments(12345678900);

        $this->assertFalse($cpf_int->isValid());
        $this->assertTrue($cpf_int->isInvalid());
    }

    public function testShouldBeInvalidWhenIsAnInvalidFormattedCPF()
    {
        $cpf_formatted = new FiscalDocuments('123.456.789-00');

        $this->assertFalse($cpf_formatted->isValid());
        $this->assertTrue($cpf_formatted->isInvalid());
    }

    public function testShouldBeValidWhenIsAValidStringCNPJ()
    {
        $cnpj_string = new FiscalDocuments('00000000000191');

        $this->assertTrue($cnpj_string->isValid());
        $this->assertFalse($cnpj_string->isInvalid());
    }

    // public function testShouldBeValidWhenIsAValidIntegerCNPJ()
    // {
    //     $cnpj = intval('00000000000191');
    //     $cnpj_int = new FiscalDocuments($cnpj);

    //     $this->assertTrue($cnpj_int->isValid());
    // }

    public function testShouldBeValidWhenIsAValidFormattedCNPJ()
    {
        $cnpj_formatted = new FiscalDocuments('00.000.000/0001-91');

        $this->assertTrue($cnpj_formatted->isValid());
        $this->assertFalse($cnpj_formatted->isInvalid());
    }

    public function testShouldBeInvalidWhenIsAnInvalidStringCNPJ()
    {
        $cnpj_string = new FiscalDocuments('00000000000190');

        $this->assertFalse($cnpj_string->isValid());
        $this->assertTrue($cnpj_string->isInvalid());
    }

    // public function testShouldBeInvalidWhenIsAnInvalidIntegerCNPJ()
    // {
    //     $cnpj_int = new FiscalDocuments(00000000000190);

    //     $this->assertFalse($cnpj_int->isValid());
    // }

    public function testShouldBeInvalidWhenIsAnInvalidFormattedCNPJ()
    {
        $cnpj_formatted = new FiscalDocuments('00.000.000/0001-90');

        $this->assertFalse($cnpj_formatted->isValid());
        $this->assertTrue($cnpj_formatted->isInvalid());
    }

    public function testShouldBeValidWhenIsAValidStringNIF()
    {
        $nif_string = new FiscalDocuments('123456789');

        $this->assertTrue($nif_string->isValid());
        $this->assertFalse($nif_string->isInvalid());
    }

    public function testShouldBeValidWhenIsAValidIntegerNIF()
    {
        $nif_int = new FiscalDocuments(123456789);

        $this->assertTrue($nif_int->isValid());
        $this->assertFalse($nif_int->isInvalid());
    }

    public function testShouldBeValidWhenIsAValidFormattedNIF()
    {
        $nif_formatted = new FiscalDocuments('123.456.789');

        $this->assertTrue($nif_formatted->isValid());
        $this->assertFalse($nif_formatted->isInvalid());
    }

    public function testShouldBeInvalidWhenIsAnInvalidStringNIF()
    {
        $nif_string = new FiscalDocuments('123456788');

        $this->assertFalse($nif_string->isValid());
        $this->assertTrue($nif_string->isInvalid());
    }

    public function testShouldBeInvalidWhenIsAnInvalidIntegerNIF()
    {
        $nif_int = new FiscalDocuments(123456788);

        $this->assertFalse($nif_int->isValid());
        $this->assertTrue($nif_int->isInvalid());
    }

    public function testShouldBeInvalidWhenIsAnInvalidFormattedNIF()
    {
        $nif_formatted = new FiscalDocuments('123.456.788');

        $this->assertFalse($nif_formatted->isValid());
        $this->assertTrue($nif_formatted->isInvalid());
    }

    public function testShouldPreserveCPFString()
    {
        $this->assertEquals('CPF', FiscalDocuments::DOC_TYPE_CPF);
    }

    public function testShouldPreserveCNPJString()
    {
        $this->assertEquals('CNPJ', FiscalDocuments::DOC_TYPE_CNPJ);
    }

    public function testShouldPreserveNIFString()
    {
        $this->assertEquals('NIF', FiscalDocuments::DOC_TYPE_NIF_POR);
    }

    public function testShouldReturnCorrectTypeWhenIsAValidStringCPF()
    {
        $cpf_string = new FiscalDocuments('12345678909');

        $this->assertEquals(FiscalDocuments::DOC_TYPE_CPF, $cpf_string->getType());
    }

    public function testShouldReturnCorrectTypeWhenIsAValidIntegerCPF()
    {
        $cpf_int = new FiscalDocuments(12345678909);

        $this->assertEquals(FiscalDocuments::DOC_TYPE_CPF, $cpf_int->getType());
    }

    public function testShouldReturnCorrectTypeWhenIsAValidFormattedCPF()
    {
        $cpf_formatted = new FiscalDocuments('123.456.789-09');

        $this->assertEquals(FiscalDocuments::DOC_TYPE_CPF, $cpf_formatted->getType());
    }

    public function testShouldReturnCorrectTypeWhenIsAValidStringCNPJ()
    {
        $cnpj_string = new FiscalDocuments('00000000000191');

        $this->assertEquals(FiscalDocuments::DOC_TYPE_CNPJ, $cnpj_string->getType());
    }

    // public function testShouldReturnCorrectTypeWhenIsAValidIntegerCNPJ()

    public function testShouldReturnCorrectTypeWhenIsAValidFormattedCNPJ()
    {
        $cnpj_formatted = new FiscalDocuments('00.000.000/0001-91');

        $this->assertEquals(FiscalDocuments::DOC_TYPE_CNPJ, $cnpj_formatted->getType());
    }

    public function testShouldReturnCorrectTypeWhenIsAValidStringNIF()
    {
        $nif_string = new FiscalDocuments('123456789');

        $this->assertEquals(FiscalDocuments::DOC_TYPE_NIF_POR, $nif_string->getType());
    }

    public function testShouldReturnCorrectTypeWhenIsAValidIntegerNIF()
    {
        $nif_int = new FiscalDocuments(123456789);

        $this->assertEquals(FiscalDocuments::DOC_TYPE_NIF_POR, $nif_int->getType());
    }

    public function testShouldReturnCorrectTypeWhenIsAValidFormattedNIF()
    {
        $nif_formatted = new FiscalDocuments('123.456.789');

        $this->assertEquals(FiscalDocuments::DOC_TYPE_NIF_POR, $nif_formatted->getType());
    }

    // public function testShouldReturnFalseWhenIsInvalidStringCPF()
    // {
    //     $invalid_type = new FiscalDocuments('12345678900');

    //     $this->assertFalse($invalid_type->getType());
    // }

    public function testShouldReturnFalseWhenIsALargeSizeString()
    {
        $large_size_string = new FiscalDocuments('123456789091');

        $this->assertFalse($large_size_string->isValid());
        $this->assertTrue($large_size_string->isInvalid());
    }

    public function testShouldReturnFalseWhenIsALargeSizeInteger()
    {
        $large_size_int = new FiscalDocuments(123456789091);

        $this->assertFalse($large_size_int->isValid());
        $this->assertTrue($large_size_int->isInvalid());
    }

    public function testShouldReturnFalseWhenIsALargeSizeFormatted()
    {
        $large_size_formatted = new FiscalDocuments('123.456.789-091');

        $this->assertFalse($large_size_formatted->isValid());
        $this->assertTrue($large_size_formatted->isInvalid());
    }

    public function testShouldReturnFalseWhenIsASmallSizeString()
    {
        $small_size_string = new FiscalDocuments('12345678');

        $this->assertFalse($small_size_string->isValid());
        $this->assertTrue($small_size_string->isInvalid());
    }

    public function testShouldReturnFalseWhenIsASmallSizeInteger()
    {
        $small_size_int = new FiscalDocuments(12345678);

        $this->assertFalse($small_size_int->isValid());
        $this->assertTrue($small_size_int->isInvalid());
    }

    public function testShouldReturnFalseWhenIsASmallSizeFormatted()
    {
        $small_size_formatted = new FiscalDocuments('123.456.78');

        $this->assertFalse($small_size_formatted->isValid());
        $this->assertTrue($small_size_formatted->isInvalid());
    }

    public function testShouldReturnFalseWhenIsANullString()
    {
        $null_string = new FiscalDocuments('');

        $this->assertFalse($null_string->isValid());
        $this->assertTrue($null_string->isInvalid());
    }

    public function testShouldReturnFalseWhenIsANullInteger()
    {
        $null_int = new FiscalDocuments(0);

        $this->assertFalse($null_int->isValid());
        $this->assertTrue($null_int->isInvalid());
    }

    public function testShouldReturnFalseWhenIsANullFormatted()
    {
        $null_formatted = new FiscalDocuments('0');

        $this->assertFalse($null_formatted->isValid());
        $this->assertTrue($null_formatted->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnInvalidString()
    {
        $invalid_string = new FiscalDocuments('');

        $this->assertFalse($invalid_string->getType());
    }

    public function testShouldReturnFalseWhenIsAnInvalidInteger()
    {
        $invalid_int = new FiscalDocuments(0);

        $this->assertFalse($invalid_int->getType());
    }

    public function testShouldReturnFalseWhenIsAnInvalidFormatted()
    {
        $invalid_formatted = new FiscalDocuments('0');

        $this->assertFalse($invalid_formatted->getType());
    }

    public function testShouldReturnFalseWhenIsAnOnlyNumberCNPJString()
    {
        $invalid_string = new FiscalDocuments('00000000000000');

        $this->assertFalse($invalid_string->isValid());
        $this->assertTrue($invalid_string->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnOnlyNumberCNPJInteger()
    {
        $invalid_int = new FiscalDocuments(00000000000000);

        $this->assertFalse($invalid_int->isValid());
        $this->assertTrue($invalid_int->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnOnlyNumberCNPJFormatted()
    {
        $invalid_formatted = new FiscalDocuments('00.000.000/0000-00');

        $this->assertFalse($invalid_formatted->isValid());
        $this->assertTrue($invalid_formatted->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnOnlyNumberCPFString()
    {
        $invalid_string = new FiscalDocuments('00000000000');

        $this->assertFalse($invalid_string->isValid());
        $this->assertTrue($invalid_string->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnOnlyNumberCPFInteger()
    {
        $invalid_int = new FiscalDocuments(00000000000);

        $this->assertFalse($invalid_int->isValid());
        $this->assertTrue($invalid_int->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnOnlyNumberCPFFormatted()
    {
        $invalid_formatted = new FiscalDocuments('000.000.000-00');

        $this->assertFalse($invalid_formatted->isValid());
        $this->assertTrue($invalid_formatted->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnOnlyNumberNIFString()
    {
        $invalid_string = new FiscalDocuments('000000000');

        $this->assertFalse($invalid_string->isValid());
        $this->assertTrue($invalid_string->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnOnlyNumberNIFInteger()
    {
        $invalid_int = new FiscalDocuments(000000000);

        $this->assertFalse($invalid_int->isValid());
        $this->assertTrue($invalid_int->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnOnlyNumberNIFFormatted()
    {
        $invalid_formatted = new FiscalDocuments('000.000.000');

        $this->assertFalse($invalid_formatted->isValid());
        $this->assertTrue($invalid_formatted->isInvalid());
    }

    public function testShouldReturnFalseWhenIsAnValidFistValidateNumberButNotTheSecond()
    {
        $invalid_string = new FiscalDocuments('27579093000192');

        $this->assertFalse($invalid_string->isValid());
        $this->assertTrue($invalid_string->isInvalid());
    }
}
