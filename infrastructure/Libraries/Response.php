<?php 

namespace Infrastructure\Libraries;
use \App;

class Response{
    private $status;
    private $code;
    private $data;
    private $message;
    private $config;
    private $fatalError;

    public function __construct()
    {
    }
/*====================================SERVICE METHODS====================================*/


    public function renderSuccess($code = 'FWS001', $data = null, $message = null)
    {
        $this->success($code, $data, $message);
        return $this->render();
    }

    public function renderError($code, $message = null, $data = null, $fatalError = null, $parameters = [])
    {
        $this->error($code, $message, $data, $fatalError, $parameters);
        return $this->render();
    }
    public function success($code, $data = null, $message = null)
    {
        $this->data = $data;
        $this->code = $code;
        $this->message = $message;
        $this->status = 'success';
    }

    public function error($code, $message = null, $data, $fatalError = null, $parameters = [])
    {
        $this->data = $data;
        $this->code = $code;
        if (!$message) {
            $message = $this->getStatusMessage($parameters);
        }
        $this->message = $message;
        $this->fatalError = $fatalError;
        $this->status = 'error';
    }

    public function render()
    {
        switch($this->status) {
            case 'success':
                $success = array(
                    'status' => 'success',
                );
                if($this->message) {
                    $success['message'] = $this->message;
                }
                if($this->code) {
                    $success['code'] = $this->code;
                }
                $success['data'] = ($this->data) ? $this->data : (object) array();
                return \Response::json($success, 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                break;
            case 'error':
                $error = array(
                    'status'=> 'error',
                    'message'=> $this->message,
                );
                if($this->code) {
                    $error['code'] = $this->code;
                }
                if($this->data) {
                    $error['data'] = $this->data;
                }
                $statusCode = 501;
                if($this->code == 'FWE002'){
                    $statusCode = 403;
                }else if($this->code == 'FWE999'){
                    $statusCode = 500;
                }
                return \Response::json($error, $statusCode, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                break;
        }
    }

    public function getStatusMessage($parameters =[])
    {
        $statusList = file_get_contents(base_path('config/status_list.json'));
        
        $statusList = json_decode($statusList);
        foreach ($statusList->error as $code => $message) {
            if ($code == $this->code) {
                return $this->getMessage($parameters, __($message));
            }
        }
    }
    private function getMessage($parameters, $message) {
        if($parameters) {
            $count = count($parameters);
            $arr = [];
            for($i = 0; $i < $count; $i++) {
                $arr[] = '$' . ($i + 1);
            }
            return str_replace($arr, $parameters, $message);
        }else {
            return $message;
        }
    }
}
/*====================================SUPPORT METHODS====================================*/