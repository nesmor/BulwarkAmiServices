<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Operator_activity_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get operator_activity by id
     */
    function get_operator_activity($id)
    {
        return $this->db->get_where('operator_activity',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all operator_activity
     */
    function get_all_operator_activity()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('operator_activity')->result_array();
    }
        
    /*
     * function to add new operator_activity
     */
    function add_operator_activity($params)
    {
        $this->db->insert('operator_activity',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update operator_activity
     */
    function update_operator_activity($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('operator_activity',$params);
    }
    
    /*
     * function to delete operator_activity
     */
    function delete_operator_activity($id)
    {
        return $this->db->delete('operator_activity',array('id'=>$id));
    }
}
