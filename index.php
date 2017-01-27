<?php
include_once './vendor/autoload.php';

$input = [
    '04epihim',
    'ryabcun010101'
];

$serializers = [
    new \Anboo\Types\SimpleText(),
    new \Anboo\Types\PhoneNumber(['+79254590301', '+89653197078']),
    new \Anboo\Types\Birthday(['04.10.2001'])
];

$generator = new \Anboo\Generator();
print_r($generator->generate($input, $serializers));


