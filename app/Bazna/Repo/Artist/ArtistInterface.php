<?php namespace Bazna\Repo\Artist;

interface ArtistInterface {


    public function exclusiveArtist();

    public function create(array $data);

    public function getRecent();

}
