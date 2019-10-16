<?php

abstract class Command
{
    public abstract function execute($connection);
    
    public abstract function setParameters($parameters = array());
    
    public abstract function getResponse($format = "json");
}

 