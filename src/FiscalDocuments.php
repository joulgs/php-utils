<?php

namespace JGS\Utils;

class FiscalDocuments
{
    public $doc_number;
    public $type;
    public const DOC_TYPE_NIF_POR = 'NIF';
    // removido pos não tem uma forma sempre correta de ser validado: https://github.com/assoft-portugal/SAF-T-AO/discussions/132
    // public const DOC_TYPE_NIF_ANG = 'NIF_ANG'; 
    public const DOC_TYPE_CPF = 'CPF';
    public const DOC_TYPE_CNPJ = 'CNPJ';

    public function __construct($number)
    {
        $this->doc_number = preg_replace('/\D/' , '', trim($number));
    }

    public function getType()
    {
        switch(strlen($this->doc_number))
        {
            case 9:
                return self::DOC_TYPE_NIF_POR;
            // case 10:
            //     return self::DOC_TYPE_NIF_ANG;
            case 11:
                return self::DOC_TYPE_CPF;
            case 14:
                return self::DOC_TYPE_CNPJ;
            default:
                return false;
        }
    }

    public function isValid()
    {
        $type = $this->getType();
        if( ! $type)
            return false;
        
        switch($type)
        {
            case self::DOC_TYPE_NIF_POR:
                return $this->validateNIF();
            // case self::DOC_TYPE_NIF_ANG:
            //     return $this->validateNIFAng();
            case self::DOC_TYPE_CPF:
                return $this->validateCPF();
            case self::DOC_TYPE_CNPJ:
                return $this->validateCNPJ();
        }
    }

    public function isInvalid()
    {
        return ! $this->isValid();
    }

    private function validateNIFAng()
    {
        $nif = $this->doc_number;

        $nif_split = str_split($nif);

        $nif_primeiros_digito = array(1, 2, 3, 5, 6, 7, 8, 9);

        if (is_numeric($nif) && strlen($nif) == 10 && in_array($nif_split[0], $nif_primeiros_digito))
        {
            $check_digit = 0;
            for ($i = 0; $i < 9; $i++)
            {
                $check_digit += $nif_split[$i] * (11 - $i - 1);
            }
            
            $check_digit = 12 - ($check_digit % 12);
            $check_digit = $check_digit >= 11 ? 0 : $check_digit;
            
            if ($check_digit == $nif_split[9])
                return true;
        }

        return false;
    }

    private function validateNIF()
    {
        $nif = $this->doc_number;
        $nif_split = str_split($nif);
        $nif_primeiros_digito = array(1, 2, 3, 5, 6, 7, 8, 9);

        if (is_numeric($nif) && strlen($nif) == 9 && in_array($nif_split[0], $nif_primeiros_digito))
        {
            $check_digit = 0;
            for ($i = 0; $i < 8; $i++)
            {
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

        for ($t = 9; $t < 11; $t++)
        {
            for ($d = 0, $c = 0; $c < $t; $c++)
            {
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
}