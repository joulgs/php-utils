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
}
