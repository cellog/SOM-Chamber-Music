<?php
class SOM
{
    private $org_id = 136384;
    private $apikey;
    private $appid;
    protected $key;
    function __construct($nologin = false)
    {
        $user = explode('/', $_SERVER['DOCUMENT_ROOT']);
        $user = $user[2];
        $data = json_decode(file_get_contents('/home/' . $user . '/somchamber.json'));
        $this->apikey = $data->key;
        $this->appid = $data->client;
        Podio::setup($this->appid, $this->apikey);
        if (!$nologin) {
            if (!isset($_GET['logout']) && (isset($_SESSION['access_token']) || $this->authenticate())) {
                $this->key = $_SESSION['access_token'];
            } else {
                $this->login();
            }
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
            Podio::authenticate('authorization_code', array('code' => $_GET['code'],
                                                            'redirect_uri' => 'http://chiaraquartet.net/SOM-Chamber-Music/'));
            $_SESSION['access_token'] = Podio::$oauth->access_token;
            return true;
        }
        return false;
    }

    function path()
    {
        return '/SOM-Chamber-Music/index.php';
    }

    function linkTo($thing)
    {
        return '<a href="' . $thing->link($this) . '">' . $thing->name() . '</a>';
    }

    function getOrg()
    {
        return $this->org_id;
    }

    function route()
    {
        $route = new SOM\Routes\Home;
        if (isset($_SERVER['PATH_INFO'])) {
            $map = array('workspace' => 'SOM\\Routes\\Workspace',
                         'clone' => 'SOM\\Routes\\Workspace\\Cloner',
                         //'test' => 'SOM\\Routes\\Test',
                         );
            $info = explode('/', $_SERVER['PATH_INFO']);
            if (isset($map[$info[1]])) {
                $class = $map[$info[1]];
                $route = new $class(array_slice($info, 2));
            }
        }
        $route->activate($this);
    }
}
