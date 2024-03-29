<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Call_center_has_service_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get call_center_has_service by id
     */
    function get_call_center_has_service($id)
    {
        return $this->db->get_where('call_center_has_service',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all call_center_has_service
     */
    function get_all_call_center_has_service()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('call_center_has_service')->result_array();
    }
        
    /*
     * function to add new call_center_has_service
     */
    function add_call_center_has_service($params)
    {
        $this->db->insert('call_center_has_service',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update call_center_has_service
     */
    function update_call_center_has_service($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('call_center_has_service',$params);
    }
    
    /*
     * function to delete call_center_has_service
     */
    function delete_call_center_has_service($id)
    {
        return $this->db->delete('call_center_has_service',array('id'=>$id));
    }
}
