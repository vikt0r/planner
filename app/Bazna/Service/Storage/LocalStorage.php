<?php namespace Bazna\Service\Storage;

class LocalStorage implements BaseStorageInterface {

    protected $upldRoot;

    public function __construct()
    {
        $this->upldRoot = storage_path().'/media/';
    }


	public function storeNew($data)
	{
        $nowtime = time();
        $filename = md5($nowtime * $data['gaan']->getClientOriginalName() ).'.mp3';

        $storeFolder = $data['artist_id'].'-'.strtolower(
            preg_replace("/[^a-zA-Z0-9]+/", "", $data['artist'])
            );
        
        $uploadSuccess = $data['gaan']->move($this->upldRoot .'/'.$storeFolder.'/', $filename);
		
        if($uploadSuccess)
        {
            return array('status'=>1, 'filepath'=>$storeFolder, 'filename'=>$filename);
        } else
            return array('status'=>0);

	}

    public function getStream()
    {

    }
}
