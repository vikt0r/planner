<?php namespace Bazna\Repo\User;

use Illuminate\Database\Eloquent\Model;
use Bazna\Service\Validators\User;

//SERVICES
use Bazna\Service\Email\UserEmail;


use Bazna\Repo\User\UserInterface;


class EloquentUser implements UserInterface {

    protected $user;

    // Class expects an Eloquent model
    public function __construct(Model $user)
    {
        $this->user = $user;

    }


    public function create(array $data)
    {
        $validation = new User($data);
        // is valid?
        if ( $validation->passes() )
        {
        	//1. create user
        	$result = $this->user->firstOrCreate(array(
                            'email' => $data['email'],
                            'password' => \Hash::make($data['password']),
                        ));

        	// created in database?
        	if ($result)
        	{
        		$usermailer = new UserEmail;
        		//Registration confirmation mail sent?
        		if ( $usermailer->registraionEmail() != 1)
        		{
        			return 0;
        		}
        		else
        			return 1;
        	}
	        else
	            return 0;


        } else {
            echo '<p>Errors: <pre>'; var_dump($validation->errors); echo '</pre></p>';
        }
    }

    public function whatErrors()
    {
        return $this->errors;
    }

    public function errors()
    {

    }

    public function get($id, array $related = null)
    {

    }

    public function getWhere($column, $value, array $related = null)
    {

    }

    public function getRecent($limit, array $related = null)
    {
        // return $this->user->with('artist', 'album')->orderBy('updated_at', 'ASC')->paginate($limit);

    }



    public function update(array $data)
    {

    }

    public function delete($id)
    {

    }

    public function deleteWhere($column, $value)
    {

    }



    public function addNew($input)
    {

    }

    /**
     * Retrieve article by id
     * regardless of status
     *
     * @param  int $id Article ID
     * @return stdObject object of article information
     */
    public function byId($id)
    {
        return $this->user
                ->where('id', $id)
                ->first();
    }



}
