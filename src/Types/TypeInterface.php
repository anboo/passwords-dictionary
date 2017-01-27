<?php
/**
 * Created by PhpStorm.
 * User: anboo
 * Date: 27.01.17
 * Time: 16:33
 */

namespace Anboo\Types;


interface TypeInterface
{
    public function generateVariants(array $data);
    public function getVariants();
    public function getParts();
}