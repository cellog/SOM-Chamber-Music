<?php
class SOM
{
    private $apikey;
    private $appid;
    function __construct()
    {
        $user = explode('/', $_SERVER['DOCUMENT_ROOT']);
        $user = $user[2];
        $data = json_decode(file_get_contents('/home/' . $user . '/somchamber.json'));
        $this->apikey = $data['key'];
        $this->appid = $data['client'];
        var_dump($data);
    }

    function getAPIKey()
    {
        
    }

    function login()
    {
        header('Location: https://podio.com/oauth/authorize?client_id=YOUR_APP_ID&redirect_uri=http://chiaraquartet.net/SOM-Chamber-Music');
    }
}
