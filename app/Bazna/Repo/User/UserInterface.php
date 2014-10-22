<?php namespace Bazna\Repo\User;
use Bazna\Repo\BaseRepositoryInterface;



interface UserInterface extends BaseRepositoryInterface {


	public function addNew($input);
    /**
     * Retrieve article by id
     * regardless of status
     *
     * @param  int $id Article ID
     * @return stdObject object of article information
     */
    public function byId($id);

}