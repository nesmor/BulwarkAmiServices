<?php


//This ami invoker in command design pattern.
class AMClient
{
    
    var $ci;
    var $response = array();
    
    const CONN_FORBIDDEN = 403;
 
    function  __construct(){
        $this->ci = &get_instance();
        $this->ci->load->library("phpagi/AMConnection",null, "AMConnection");
    }
    
    public function actionDeviceState($parameters){
        $this->ci->load->library("phpagi/command/DeviceStateCommand", null, "devStateCommand");
        $res = $this->ci->AMConnection->connect();
        if($res == FALSE) {
            $response['error'] = CONN_FORBIDDEN;
            return reponse;
        }
        $this->ci->devStateCommand->setParameters($parameters);
        $this->ci->devStateCommand->execute($this->ci->AMConnection, $parameters);
        $response = $this->ci->devStateCommand->getResponse();
        $this->ci->AMConnection->disconnect();
        return $response;
    }
    
    public function actionShowChannels($parameters){
        
    }
    
    
    public function actionOriginate($parameters){
	$this->ci->load->library("phpagi/command/OriginateCommand", null, "asteriskCommand");
        $res = $this->ci->AMConnection->connect();
        if($res == FALSE) {
            $response['error'] = CONN_FORBIDDEN;
            return reponse;
        }
      //  var_dump($parameters);die;
        $this->ci->asteriskCommand->setParameters($parameters);
        $this->ci->asteriskCommand->execute($this->ci->AMConnection);
        $response = $this->ci->asteriskCommand->getResponse();
        $this->ci->AMConnection->disconnect();
        return $response;
        
    }
    
}

?>

