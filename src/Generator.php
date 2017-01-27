<?php
/**
 * Created by PhpStorm.
 * User: anboo
 * Date: 27.01.17
 * Time: 16:45
 */

namespace Anboo;


use Anboo\Types\TypeInterface;

class Generator implements GeneratorInterface
{
    public function combineArray($arr, &$collect)
    {
        for ($i = 0; $i < count($arr); $i++) {
            $arrCopy = $arr;
            $elem = array_splice($arrCopy, $i, 1); // removes and returns the i'th element
            if (count($arrCopy) > 0) {
                $this->combineArray($arrCopy, $collect);
            } else {
                $collect[] = $elem[0];
            }
        }
    }

    public function generate($passwords, $serializers)
    {
        $variants = [];

        foreach($passwords as $password) {
            foreach($serializers as $serializer) {
                if(!$serializer instanceof TypeInterface) {
                    throw new \LogicException(sprintf('Type %s should be implement TypeInterface', get_class($serializer)));
                }

                $serializer->generateVariants([$password]);
                $variants = array_merge($variants, $serializer->getVariants());
            }
        }

        $combinations = [];
        $this->combineArray($variants, $combinations);

        return array_unique(array_merge($variants, $combinations));
    }
}