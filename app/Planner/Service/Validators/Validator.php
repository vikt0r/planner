<?php namespace Bazna\Service\Validators;

abstract class Validator {

    protected $inputdata;
    public $errors;

    public function __construct($inputdata = null)
    {
        $this->inputdata = $inputdata ?: \Input::all();
        //echo '<p>INPUTS<pre>'; var_dump($this->inputdata); echo '</pre></p>';
    }



    public function passes()
    {
        $validation = \Validator::make($this->inputdata, static::$rules);

        if ($validation->passes())
            return true;

        $this->errors = $validation->messages();

        return false;
    }


}
