<?php
/**
 * Created by PhpStorm.
 * User: anboo
 * Date: 27.01.17
 * Time: 16:33
 */

namespace Anboo\Types;


abstract class AbstractType implements TypeInterface
{
    protected $variants = [];

    protected $parts;

    public function generateVariants(array $data) {}

    protected function addVariant($variant) {
        $this->variants[] = $variant;
    }

    public function getVariants()
    {
        return $this->variants;
    }

    protected function addPart($part) {
        $this->parts[] = $part;
    }

    public function getParts()
    {
        return $this->parts;
    }
}