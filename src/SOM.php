<?php
class SOM
{
    private $org_id = 136384;
    private $apikey;
    private $appid;
    protected $key;
    function __construct()
    {
        Podio::setup($this->appid, $this->apikey);
        $user = explode('/', $_SERVER['DOCUMENT_ROOT']);
        $user = $user[2];
        $data = json_decode(file_get_contents('/home/' . $user . '/somchamber.json'));
        $this->apikey = $data->key;
        $this->appid = $data->client;
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
            Podio::authenticate('authorization_code', array('code' => $_GET['code'],
                                                            'redirect_uri' => 'http://chiaraquartet.net/SOM-Chamber-Music/'));
            $_SESSION['access_token'] = Podio::$oauth->access_token;
            return true;
        }
        return false;
    }

    function path()
    {
        return '/SOM-Chamber-Music';
    }

    function linkTo($thing)
    {
        return '<a href="' . $thing->link($this) . '">' . $thing->name() . '</a>';
    }

    function home()
    {
        $spaces = PodioSpace::get_for_org($this->org_id);
        foreach ($spaces as $space) {
            if (false !== strpos($space->name, 'SOM: Chamber Music')) {
                $space = new SOM\Workspace($space);
                echo $this->linkTo($space) . '<br>'; // hack to get started
            }
        }
    }

    function route()
    {
        if (!isset($_SERVER['PATH_INFO'])) {
            return $this->home();
        }
        $info = explode('/', $_SERVER['PATH_INFO']);
    }
}
