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
        $mapfile = __DIR__ . '/map.json';
        if (file_exists('/home/' . $user . '/somchamber.json')) {
            $clientfile = '/home/' . $user . '/somchamber.json';
            $mapfile = '/home/' . $user . '/map.json';
        } else {
            // local debugging
            $clientfile = __DIR__ . '/somchamber.json';
        }
        if (file_exists('/home/' . $user . '/podiotokens.json')) {
            $tokenfile = '/home/' . $user . '/podiotokens.json';
        } else {
            // local debugging
            $tokenfile = __DIR__ . '/podiotokens.json';
        }
        $this->tokenmanager = new Chiara\AuthManager\File($tokenfile, $clientfile, $mapfile, true);
        Chiara\AuthManager::setAuthMode(Chiara\AuthManager::USER);
        Chiara\AuthManager::setTokenManager($this->tokenmanager);
        if (!$nologin) {
            if (!isset($_GET['logout']) && (Podio::$oauth->access_token || $this->authenticate())) {
                $this->key = Podio::$oauth->access_token;
            } else {
                $this->login();
            }
        }
    }

    function login()
    {
        $clientinfo = $this->tokenmanager->getAPIClient();
        header('Location: https://podio.com/oauth/authorize?client_id=' . $clientinfo['client'] . '&redirect_uri=' .
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
