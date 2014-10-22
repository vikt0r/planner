<?php namespace Bazna\Service\Storage;
// use Bazna\Queue\AmazonService;

class AmazonStorage implements BaseStorageInterface {

    protected $upldRoot;
    protected $bucket;


    public function __construct()
    {
        $this->upldRoot = storage_path().'/media/';
        $this->bucket = 'mp3app4dustume';
    }

	public function storeNew($data)
	{
		$musicfile = $this->upldRoot . $data['filepath'] .'/'. $data['filename'];

    // $pushed2Queue = \Queue::push('Bazna\Queue\AmazonService', array(
    //             'key'=>$data['filepath'].'/'.$data['filename'],
    //             'bucket' => $this->bucket,
    //             'sourcefile' => $musicfile 
    //         ));

    // return $pushed2Queue;
		$s3 = \App::make('aws')->get('s3');
        
        try {
            $result = $s3->putObject(array(
                'Bucket'=> $this->bucket,
                'Key' => 'songs/'.$data['filepath'].'/'.$data['filename'],
                'SourceFile' => $musicfile, 
                'ACL' => 'public-read'
            ));

            $s3->waitUntilObjectExists(array(
                'Bucket' => $this->bucket,
                'Key'    => $data['filename']
            ));
            return $result;

        } catch (S3Exception $e)
        {
           echo '<p>There was an error uploading file</p>';
        }
  

	}

    public function getStream()
    {

    }
}
