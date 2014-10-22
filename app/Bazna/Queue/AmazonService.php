<?php namespace Bazna\Queue;

class AmazonService {

    public function fire($job, $data)
    {
        $s3 = \App::make('aws')->get('s3');

        $result = $s3->putObject(array(
            'Bucket'=> $data['bucket'],
            'Key' => $data['key'],
            'SourceFile' => $data['sourcefile'], 
            'ACL' => 'public-read'
        ));

        $s3->waitUntilObjectExists(array(
            'Bucket' => $data['bucket'],
            'Key'    => $data['key']
        ));
        
    }

}