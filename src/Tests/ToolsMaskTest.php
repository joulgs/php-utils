<?php

namespace JGS\Utils\Tests;

use JGS\Utils\Tools;
use PHPUnit\Framework\TestCase;

class ToolsMaskTest extends TestCase
{
    public function testShouldReturnMaskedCPF()
    {
        $cpf = '11123456789';
        $masked_cpf = Tools::mask($cpf, '###.###.###-##');

        $this->assertEquals('111.234.567-89', $masked_cpf);
    }

    public function testShouldReturnMaskedCNPJ()
    {
        $cnpj = '11222333444455';
        $masked_cnpj = Tools::mask($cnpj, '##.###.###/####-##');

        $this->assertEquals('11.222.333/4444-55', $masked_cnpj);
    }

    public function testShouldReturnMaskedPhone()
    {
        $phone = '5511123456789';
        $masked_phone = Tools::mask($phone, '+## (##) #####-####');

        $this->assertEquals('+55 (11) 12345-6789', $masked_phone);
    }

    public function testShouldReturnMaskedEvenWhenGivenFewerCharacters()
    {
        $phone = '55111234';
        $masked_phone = Tools::mask($phone, '+## (##) #####-####');

        $this->assertEquals('+55 (11) 1234-', $masked_phone);
    }

    public function testShouldReturnMaskedEvenWhenGivenMoreCharacters()
    {
        $phone = '55111234567890';
        $masked_phone = Tools::mask($phone, '+## (##) #####-####');

        $this->assertEquals('+55 (11) 12345-6789', $masked_phone);
    }

    public function testShouldReturnMaskedEvenWhenGivenInteger()
    {
        $phone = 5511123456789;
        $masked_phone = Tools::mask($phone, '+## (##) #####-####');

        $this->assertEquals('+55 (11) 12345-6789', $masked_phone);
    }

    public function testShouldReturnMaskedEvenWhenGivenSpecialCharacters()
    {
        $phone = '55.11.1234-5678';
        $masked_phone = Tools::mask($phone, '+## (##) ####-####');

        $this->assertEquals('+55 (11) 1234-5678', $masked_phone);
    }
}
