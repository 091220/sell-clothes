<?php 

namespace Infrastructure\Api\Controllers;

use Infrastructure\Http\Controller as BaseController;
use Illuminate\Foundation\Application;

class DefaultApiController extends BaseController
{
    private $cookie;
    
    public function __construct(
        Application $app
    ) {
        $this->cookie = $app->make('cookie');
    }
    public function index()
    {
        return response()->json([
            'title'   => 'api-laravel-training',
            'version' => '1.0'
        ]);

    }

    public function wiki(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            $this->showLogin();
        } else {
            if($_SERVER['PHP_AUTH_USER'] == \Config('config.wiki.username') && $_SERVER['PHP_AUTH_PW'] == \Config('config.wiki.password')){
                $html = file_get_contents(public_path('/wiki/main/dist/3.0/output.html'));
                return $html;
            }else{
                $this->showLogin();
            }
        }
    }

    //=======================> SUPPORT METHOD <=========================
    private function showLogin(){
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Text to send if user hits Cancel button';
        exit;
    }
}