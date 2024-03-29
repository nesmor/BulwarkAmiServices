<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Follow_up_next_call_option_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get follow_up_next_call_option by id
     */
    function get_follow_up_next_call_option($id)
    {
        return $this->db->get_where('follow_up_next_call_option',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all follow_up_next_call_option
     */
    function get_all_follow_up_next_call_option()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('follow_up_next_call_option')->result_array();
    }
        
    /*
     * function to add new follow_up_next_call_option
     */
    function add_follow_up_next_call_option($params)
    {
        $this->db->insert('follow_up_next_call_option',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update follow_up_next_call_option
     */
    function update_follow_up_next_call_option($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('follow_up_next_call_option',$params);
    }
    
    /*
     * function to delete follow_up_next_call_option
     */
    function delete_follow_up_next_call_option($id)
    {
        return $this->db->delete('follow_up_next_call_option',array('id'=>$id));
    }
}
