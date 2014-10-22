<?php namespace Bazna\Service\Email;

interface  BaseEmailInterface {

    // public function __construct($inputdata = null);

    public function newsLetter($data);

    public function registraionEmail( $data );

    
}