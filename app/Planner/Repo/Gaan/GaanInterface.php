<?php namespace Bazna\Repo\Gaan;
//use Bazna\Repo\BaseRepositoryInterface;

interface GaanInterface {


    public function exclusiveArtist();

    public function create(array $data);

    public function getRecent();


}
