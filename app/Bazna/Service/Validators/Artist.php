<?php namespace Bazna\Service\Validators;

class Artist extends Validator {

    public static $rules = [
        'name' => 'required|between:4,40',
        'about' => 'between:4,256',
        'avatar' => 'required|image|between:40,1024'
    ];

}
