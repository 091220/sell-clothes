<?php 

namespace Infrastructure\Testing\BaseTest;

trait BaseFeatureTrait{

    public function getAll($headers,$action)
    {
        $result = $this->get($action,$headers);
        return $this->checkResponse($result);
    }
    public function getById($headers,$action,$id)
    {
        $result = $this->get($action.'/'.$id,$headers);
        return $this->checkResponse($result);
    }
    public function create($headers,$action,$params)
    {
        $result = $this->post($action,$params,$headers);
        return $this->checkResponse($result,'post');
    }
    public function update($headers,$action,$params,$id)
    {
        $result = $this->put($action.'/'.$id,$params,$headers);
        return $this->checkResponse($result);
    }
    public function del($headers,$action,$id)
    {
        $result = $this->withHeaders($headers)->json('DELETE', $action.'/'.$id);
        return $this->checkResponse($result);
    }
    private function checkResponse($result,$action = null){
        if(!empty($action)){
            $content = $result->content();

            if(!empty($content)){
                $content = json_decode($content,true);
                if(!empty($content['data']['id'])){
                    return $content['data']['id'];
                }
                return false;
            }else{
                return false;
            }
        }

        if(!empty($result)){
            $content = $result->content();
            if(!empty($content)){
                $content = json_decode($content,true);
                if($content['code'] == 'FWS001'){
                    return true;
                }
            }
        }
        return false;
    }
}