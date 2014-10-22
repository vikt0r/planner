<?php namespace Bazna\Repo\Artist;

use Illuminate\Database\Eloquent\Model;
use Bazna\Service\Validators\Artist;
use Bazna\Repo\AbstractRepository;


class EloquentArtist extends AbstractRepository  implements ArtistInterface  {


    // Class expects an Eloquent model
    public function __construct(Model $artist)
    {
        $this->repo = $artist;
        $this->errors = array( 'code'=>0, 'evils'=>array());
    }


    public function getRecent()
    {
        return $this->repo->take(5)->get();
    }

    public function exclusiveArtist()
    {
        return 'Artist Exclusive Function';
    }




    public function create(array $data)
    {
        $validation = new Artist($data);

        if ($validation->passes())
        {
                $result = $this->repo->create(array(
                            'name' => $data['name'],
                            'about' => $data['about'],
                            'avatar' => $data['avatar'],
                        ));
                if ($result)
                    return $result;
                else
                    return false;
        }
        else
        {
            $this->errors['evils']['validation'] =  $validation->errors->all();
            $this->errors['code'] = 400;
            // echo 'ERROR';
            return false;
        }



    }



}
