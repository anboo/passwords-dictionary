<?php
/**
 * Created by PhpStorm.
 * User: anboo
 * Date: 27.01.17
 * Time: 16:33
 */

namespace Anboo\Types;


class SimpleText extends AbstractType
{
    public function generateVariants(array $data)
    {
        foreach($data as $password) {
            $integerPart = filter_var($password, FILTER_SANITIZE_NUMBER_INT);
            $stringPart = filter_var($password, FILTER_SANITIZE_STRING);

            $this->addPart($stringPart);
            $this->addPart($integerPart);

            $passwordWithoutIntegers = str_replace($integerPart, '', $password);
            $this->addVariant($passwordWithoutIntegers);
            $passwordWithIntegersInStart = $integerPart . $stringPart;
            $this->addVariant($passwordWithIntegersInStart);
            $passwordWithIntegersInEnd = $stringPart . $integerPart;
            $this->addVariant($passwordWithIntegersInEnd);
        }
    }
}