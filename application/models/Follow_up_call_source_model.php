<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Follow_up_call_source_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get follow_up_call_source by id
     */
    function get_follow_up_call_source($id)
    {
        return $this->db->get_where('follow_up_call_source',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all follow_up_call_source
     */
    function get_all_follow_up_call_source()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('follow_up_call_source')->result_array();
    }
        
    /*
     * function to add new follow_up_call_source
     */
    function add_follow_up_call_source($params)
    {
        $this->db->insert('follow_up_call_source',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update follow_up_call_source
     */
    function update_follow_up_call_source($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('follow_up_call_source',$params);
    }
    
    /*
     * function to delete follow_up_call_source
     */
    function delete_follow_up_call_source($id)
    {
        return $this->db->delete('follow_up_call_source',array('id'=>$id));
    }
}
