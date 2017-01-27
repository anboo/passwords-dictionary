<?php
/**
 * Created by PhpStorm.
 * User: anboo
 * Date: 27.01.17
 * Time: 16:46
 */

namespace Anboo;


interface GeneratorInterface
{
    public function generate($passwords, $serializers);
}