<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Script_answer_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get script_answer by id
     */
    function get_script_answer($id)
    {
        return $this->db->get_where('script_answer',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all script_answer
     */
    function get_all_script_answer()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('script_answer')->result_array();
    }
        
    /*
     * function to add new script_answer
     */
    function add_script_answer($params)
    {
        $this->db->insert('script_answer',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update script_answer
     */
    function update_script_answer($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('script_answer',$params);
    }
    
    /*
     * function to delete script_answer
     */
    function delete_script_answer($id)
    {
        return $this->db->delete('script_answer',array('id'=>$id));
    }
}
