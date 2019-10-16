<?php

require_once 'phpagi-asmanager.php';


class AMConnection
{
    var $ci;
    
    var $connection;
    
    var $ami;
    
    function __construct(){
        
        $this->ci = & get_instance();
        
        $this->ci->load->config("asterisk");
        
        $this->ami = new AGI_AsteriskManager();
        
    }
    
    
    public function connect(){
        
        $host = $this->ci->config->item('ami_host');
        
        $port = $this->ci->config->item('ami_port');
        
        $username = $this->ci->config->item('ami_username');
        
        $password = $this->ci->config->item('ami_password');
        
        return $this->ami->connect($host, $username, $password);
    }
    
    public function disconnect(){
        $this->ami->disconnect();
        
    }
    
}
?>
