<?php namespace Bazna\Service\Email;

// use Illuminate\Database\Eloquent\Model;
use Logger;
class UserEmail implements BaseEmailInterface {


	public function registraionEmail($data = null)
	{
        $mailSuccess = false;
        //send actual email
		
        if($mailSuccess)
        {
            return 1;
        } else
        {
            // log creation failed
            Logger::failLog(0, '432.234.23', 'UserEmail', 'registraionEmail', 
                'registrationEmail inside UserEmail Service' );

            return 0;
        }

	}

     public function newsLetter($data)
     {

     }

  
}
