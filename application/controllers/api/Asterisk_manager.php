<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Asterisk_manager extends REST_Controller {
    
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library("phpagi/AMClient", null, "amClient");
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['execute_put']['limit'] = 500; // 500 requests per hour per user/key

    }
    
    //Uri action is method named in amClient
    public function execute_put(){
       $action = 'action' . $this->uri->segment($this->uri->total_segments());
     //  var_dump($this->put()); die;
       $response = $this->amClient->$action($this->put()); //Each command need to implement parameters reader
       if($response['error'] === REST_Controller::HTTP_FORBIDDEN){
           $this->response(null, REST_Controller::HTTP_FORBIDDEN);
       }else{
           $this->response($response, REST_Controller::HTTP_OK); 
       }
    }
    


}
