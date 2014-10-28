<?php namespace Planner\Repo\Document;
//use Bazna\Repo\BaseRepositoryInterface;

interface DocumentInterface {


    public function exclusiveArtist();

    public function create(array $data);

    public function getRecent();


}
