<?php

namespace JGS\Utils;

class FiscalDocuments
{
    public $doc_number;
    public $type;
    public const DOC_TYPE_NIF_POR = 'NIF';
    public const DOC_TYPE_CPF = 'CPF';
    public const DOC_TYPE_CNPJ = 'CNPJ';
    public const SIZE_NIF = 9;
    public const SIZE_CPF = 11;
    public const SIZE_CNPJ = 14;

    public function __construct($number)
    {
        $this->doc_number = preg_replace('/\D/', '', trim($number));
    }

    public function getType()
    {
        if (self::isInvalid())
            return false;

        switch (strlen($this->doc_number)) {
            case self::SIZE_NIF:
                return self::DOC_TYPE_NIF_POR;
            case self::SIZE_CPF:
                return self::DOC_TYPE_CPF;
            case self::SIZE_CNPJ:
                return self::DOC_TYPE_CNPJ;
        }
    }

    public function isValid()
    {
        switch (strlen($this->doc_number)) {
            case self::SIZE_NIF:
                return $this->validateNIF();
            case self::SIZE_CPF:
                return $this->validateCPF();
            case self::SIZE_CNPJ:
                return $this->validateCNPJ();
            default:
                return false;
        }
    }

    public function isInvalid()
    {
        return !$this->isValid();
    }

    private function validateNIF()
    {
        $nif = $this->doc_number;
        $nif_split = str_split($nif);
        $nif_primeiros_digito = array(1, 2, 3, 5, 6, 7, 8, 9);

        if (is_numeric($nif) && strlen($nif) == 9 && in_array($nif_split[0], $nif_primeiros_digito)) {
            $check_digit = 0;
            for ($i = 0; $i < 8; $i++) {
                $check_digit += $nif_split[$i] * (10 - $i - 1);
            }

            $check_digit = 11 - ($check_digit % 11);
            $check_digit = $check_digit >= 10 ? 0 : $check_digit;

            if ($check_digit == $nif_split[8])
                return true;
        }

        return false;
    }

    private function validateCPF()
    {
        $cpf = $this->doc_number;

        if (preg_match('/(\d)\1{10}/', $cpf))
            return false;

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d)
                return false;
        }

        return true;
    }

    private function validateCNPJ()
    {
        $cnpj = $this->doc_number;

        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;

        $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        for ($i = 0, $n = 0; $i < 12; $n += $cnpj[$i] * $b[++$i]);

        if ($cnpj[12] != ((($n %= 11) < 2) ? 0 : 11 - $n))
            return false;

        for ($i = 0, $n = 0; $i <= 12; $n += $cnpj[$i] * $b[$i++]);

        if ($cnpj[13] != ((($n %= 11) < 2) ? 0 : 11 - $n))
            return false;

        return true;
    }

    public function getMasked()
    {
        if (self::isInvalid())
            return false;

        switch (strlen($this->doc_number)) {
            case self::SIZE_NIF:
                return Tools::mask($this->doc_number, '###.###.###');
            case self::SIZE_CPF:
                return Tools::mask($this->doc_number, '###.###.###-##');
            case self::SIZE_CNPJ:
                return Tools::mask($this->doc_number, '##.###.###/####-##');
        }
    }
}
