<?php namespace Planner\Repo\Document;

use Planner\Repo\AbstractRepository;

use Illuminate\Database\Eloquent\Model;
use Planner\Service\Validators\Document;



class EloquentDocument extends AbstractRepository  implements DocumentInterface {


    protected $repo;


    // Class expects an Eloquent model
    public function __construct(Model $document)
    {
        $this->repo = $document;
        $this->errors = array( 'code'=>0, 'evils'=>array());

    }


    public function getRecent()
    {
        return $this->repo->take(5)->get();
    }
    public function exclusiveArtist()
    {
        return 'Gaan Exclusive function';
    }

    public function create(array $data)
    {
          // 1. validate Gaan
        $validation = new Gaan($data);
        if ($validation->passes()){
            //2, check if Artist already exists or not
            $artistData = $this->artist->getWhere('name', $data['artist']);
            if($artistData)
                $data['artist_id'] = $artistData['id'];
            else {
                $artistData = $this->artist->create(array('name'=>$data['artist'],'about'=>'Need Edit'));
            }
            //3. check if Album already exists or not
            $albumData = $this->album->getWhere('name', $data['album']);
            if($albumData)
                $data['album_id'] = $albumData['id'];
            else {
                $albumData = $this->album->create(array('name'=>$data['album'],'description'=>'Need Edit'));
            }

            // 4. store file in local,cdn store
            $localStorage = new LocalStorage;
            $storageSuccess = $localStorage->storeNew($data);
            if($storageSuccess['status'] === 1)
            {
                $data['filename'] = $storageSuccess['filename'];
                $data['filepath'] = $storageSuccess['filepath'];

                $amazonStorage = new AmazonStorage;
                $cdnSuccess = $amazonStorage->storeNew($data);

                echo '<p>CDN<pre>'; var_dump($cdnSuccess); echo '</pre></p>';

                $result = $this->gaan->firstOrCreate(array(
                            'title' => $data['title'],
                            'trackno' => $data['trackno'],
                            'filename' => $storageSuccess['filename'],
                            'filepath' => $storageSuccess['filepath'],
                            'artist_id' => $data['artist_id'],
                            'album_id' => $data['album_id'],
                            'genre_id' => $data['genre'],
                            'publisher' => $data['publisher'],
                            'year' => $data['year'],
                            'composer' => $data['composer'],
                        ));
                if($result)
                    return 1;
                else
                    return 0;

            } else
            {
                echo 'ERROR';
            }



            echo '<p>data<pre>'; var_dump($data); echo '</pre></p>';

        } else {
            echo 'fail';
            echo '<p>Errors: <pre>'; var_dump($validation->errors); echo '</pre></p>';
        }
    }

    function whatErrors()
    {

    }



}
