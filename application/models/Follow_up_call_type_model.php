<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Follow_up_call_type_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get follow_up_call_type by id
     */
    function get_follow_up_call_type($id)
    {
        return $this->db->get_where('follow_up_call_type',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all follow_up_call_type
     */
    function get_all_follow_up_call_type()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('follow_up_call_type')->result_array();
    }
        
    /*
     * function to add new follow_up_call_type
     */
    function add_follow_up_call_type($params)
    {
        $this->db->insert('follow_up_call_type',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update follow_up_call_type
     */
    function update_follow_up_call_type($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('follow_up_call_type',$params);
    }
    
    /*
     * function to delete follow_up_call_type
     */
    function delete_follow_up_call_type($id)
    {
        return $this->db->delete('follow_up_call_type',array('id'=>$id));
    }
}
