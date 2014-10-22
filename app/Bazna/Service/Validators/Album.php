<?php namespace Bazna\Service\Validators;

class Album extends Validator {

    public static $rules = [
        'name' => 'required|between:4,40',
    ];

}
