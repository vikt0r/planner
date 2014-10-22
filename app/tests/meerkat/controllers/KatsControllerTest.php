<?php

class KatsControllerTest extends PHPUnit_Framework_Testcase {

    public function testIndex()
    {
        $this->client->request('Get', 'kats');
    }

}
