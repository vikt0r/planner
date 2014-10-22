<?php namespace Bazna\Repo\Album;

use Bazna\Repo\AbstractRepository;

use Illuminate\Database\Eloquent\Model;
use Bazna\Service\Validators\Album;


class EloquentAlbum extends  AbstractRepository implements AlbumInterface {


    // Class expects an Eloquent model
    public function __construct(Model $album)
    {
        $this->repo = $album;
    }


    public function exclusiveArtist()
    {
        return 'Artist only Method';
    }

    public function create(array $data)
    {
        // dd($data);
        $this->repo->insert($data);
        return $this->repo;
    }


}
