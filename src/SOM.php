<?php
class SOM
{
    private $org_id = 136384;
    private $tokenmanager;
    protected $key;
    function __construct($nologin = false)
    {
        $user = explode('/', $_SERVER['DOCUMENT_ROOT']);
        $user = $user[2];
        if (file_exists('/home/' . $user . '/somchamber.json')) {
            $clientfile = '/home/' . $user . '/somchamber.json';
        } else {
            // local debugging
            $clientfile = __DIR__ . '/somchamber.json';
        }
        $this->tokenmanager = new Chiara\AuthManager\File(__DIR__ . '/podiotokens.json', __DIR__ . '/somchamber.json', true);
        Chiara\AuthManager::setAuthMode(Chiara\AuthManager::USER);
        Chiara\AuthManager::setTokenManager($this->tokenmanager);
        Chiara\AuthManager::prepareRemote();
        if (!$nologin) {
            if (!isset($_GET['logout']) && (Podio::$oauth->access_token || $this->authenticate())) {
                $this->key = Podio::$oauth->access_token;
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
                         'makehook' => 'SOM\\Routes\\Workspace\\Hooks',
                         'importstudents' => 'SOM\\Routes\\Workspace\\Studentimport',
                         'changes' => 'SOM\\Routes\\Workspace\Changes',
                         //'updatereferences' => 'SOM\\Routes\\Workspace\\Updatereferences',
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
