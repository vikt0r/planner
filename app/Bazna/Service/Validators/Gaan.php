<?php namespace Bazna\Service\Validators;

class Gaan extends Validator {

    public static $rules = [
        'title' => 'required|between:4,40',
        'album' => 'between:4,40',
        'trackno' => 'required',
        'artist' => 'required',
        /*'gaan' => 'required|Mimes:mp3,wma'*/

    ];

}
