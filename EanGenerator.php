<?php
/*
 *
 * Created by Waldemar Graban 2022
 *
 */

class EanGenerator
{
    /**
     * Set Ean country prefix - example 590 (Poland)
     */
    const CODE_COUNTRY_PREFIX = 590;  

    /**
     * This method produces the EAN-14 code
     */
    private function generate(): string
    {
        $time = $this->getCurrentTime();

        $code = self::CODE_COUNTRY_PREFIX . str_pad( $time, 10, '0' );

        $weightFlag = true;
        $sum = 0;

        for ($i= strlen($code) -1; $i >= 0; $i--) {
            $sum += (int) $code[$i] * ($weightFlag ? 3 : 1);
            $weightFlag = !$weightFlag;
        }

        $code .= (10 - $sum % 10) % 10;

        return $code;
    }

    private function getCurrentTime(): int
    {
        $date = new DateTime();

        return $date->getTimestamp();
    }

    public function getCode(): string
    {
        return $this->generate();
    }
}

$ean = new EanGenerator();

/**
 * This method return one unique code per second
 */
echo $ean->getCode();
