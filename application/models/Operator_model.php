<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Operator_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get operator by id
     */
    function get_operator($id)
    {
        return $this->db->get_where('operator',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all operator
     */
    function get_all_operator()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('operator')->result_array();
    }
        
    /*
     * function to add new operator
     */
    function add_operator($params)
    {
        $this->db->insert('operator',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update operator
     */
    function update_operator($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('operator',$params);
    }
    
    /*
     * function to delete operator
     */
    function delete_operator($id)
    {
        return $this->db->delete('operator',array('id'=>$id));
    }
}
