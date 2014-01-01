<?php
class SOM
{
    private $apikey;
    private $appid;
    protected $key;
    function __construct()
    {
        $user = explode('/', $_SERVER['DOCUMENT_ROOT']);
        $user = $user[2];
        $data = json_decode(file_get_contents('/home/' . $user . '/somchamber.json'));
        $this->apikey = $data->key;
        $this->appid = $data->client;
        session_start();
        if (isset($_SESSION['access_token']) || $this->authenticate()) {
            $this->key = $_SESSION['access_token'];
        } else {
            $this->login();
        }
    }

    function getAccessKey()
    {
        return $this->key;
    }

    function login()
    {
        header('Location: https://podio.com/oauth/authorize?client_id=' . $this->appid . '&redirect_uri=' .
               urlencode('http://chiaraquartet.net/SOM-Chamber-Music/'));
    }

    function authenticate()
    {
        if (isset($_GET['code'])) {
            Podio::setup($this->appid, $this->apikey);
            Podio::authenticate('authorization_code', array('code' => $_GET['code'],
                                                            'redirect_uri' => 'http://chiaraquartet.net/SOM-Chamber-Music/'));
            $_SESSION['access_token'] = Podio::$oauth->access_token;
            return true;
        }
        return false;
    }
}
