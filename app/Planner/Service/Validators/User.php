<?php namespace Bazna\Service\Validators;

class User extends Validator {

    public static $rules = [
        'email' => 'required|email',
        'password' => 'between:6,32'
    ];

}
