<?php
require_once 'Command.php';

class OriginateCommand extends Command{

     var $eventName = 'Originate';

     var $parameters = '';
    
     var $response ;

    public  function execute($connection){
        
       $this->response = $connection->ami->send_request($this->eventName, $this->parameters);
       
    }
    
    public  function setParameters($parameters = array()){
	
	   $this->parameters = $parameters;

    }
    
    public  function getResponse($format = "json"){

	    return $this->response;

    }

}
?>
