<?php namespace Bazna\Repo\Album;
//use Bazna\Repo\BaseRepositoryInterface;

interface AlbumInterface {


    public function exclusiveArtist();

    public function create(array $data);


}
