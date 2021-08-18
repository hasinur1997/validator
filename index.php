<?php
require 'vendor/autoload.php';

use App\Validation\Rules\MaxRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\Validator;

$validator = new Validator([
    'first_name'  => '',
    'last_name'  => '',
    'email' =>  ''
]);

$validator->setAliases([
    'first_name'  =>  'First name',
    'last_name'  =>  'Last name'

]);


$validator->setRules([
    'first_name'  =>  [
        'required',
    ],
    'last_name' =>  [
        'required'
    ],
    'email' =>  [
        'required'
    ]
]);


if (!$validator->validate()) {
    echo "Failed";
}else{
    echo "Passed";
}
