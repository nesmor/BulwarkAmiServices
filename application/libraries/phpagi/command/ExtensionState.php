<?php

require 'Command.php';

class ExtensionState extends Command
{
    var $eventName = 'ExtensionState';
    
    var $parameters = '';
    
    var $response ;
    
    public function execute($connection)
    {
        $this->response = $connection->ami->send_request($this->eventName, $this->parameters);
    }
    
    public function setParameters($parameters = array())
    {
        $this->parameters = $parameters;
    }
    
    public function getResponse($format = "json")
    {
        return $this->response;
    }

}
?>
