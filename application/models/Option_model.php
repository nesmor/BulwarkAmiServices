<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Option_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get option by id
     */
    function get_option($id)
    {
        return $this->db->get_where('option',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all option count
     */
    function get_all_option_count()
    {
        $this->db->from('option');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all option
     */
    function get_all_option($params = array())
    {
        
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->select('*, option.id as oId, option.title as oTitle, dialog.id as dId'); //Active query bugs. Overwrite same fields name
        $this->db->from('option');
        $this->db->join('dialog', 'option.dialogId = dialog.id');
        $this->db->order_by('dialog.id', 'ASC');
        $this->db->order_by('option.dtmf', 'ASC');
        return $this->db->get()->result_array();
    }
        
    /*
     * Get all option by dialog id
     */
    function get_by_dialog_id($params = array()){
        
        $this->db->select('id as oId, title as oTitle,  dtmf, dialogId'); //Active query bugs. Overwrite same fields name
        $this->db->from('option');
        if(isset($params) && !empty($params))
        {
            $this->db->where('dialogId',$params['id']);
        }
        $this->db->order_by('dtmf', 'ASC');
        return $this->db->get()->result_array();
        
    }
    
    /*
     * Get all option count
     */
    function check_unique_option($params)
    {
         $this->db->from('option');
         $this->db->where($params);
         return ($this->db->count_all_results() >= 1)? true : false;
    }
    
//     /*
//      * Get all option
//      */
//     function get_all_option($params = array())
//     {
        
//         if(isset($params) && !empty($params))
//         {
//             $this->db->limit($params['limit'], $params['offset']);
//         }
//         $this->db->select('*, option.id as oId, option.title as oTitle, dialog.id as dId'); //Active query bugs. Overwrite same fields name
//         $this->db->from('option');
//         $this->db->join('dialog', 'option.dialogId = dialog.id');
//         $this->db->order_by('dialog.id', 'ASC');
//         $this->db->order_by('option.dtmf', 'ASC');
//         return $this->db->get()->result_array();
//     }
    
        
    /*
     * function to add new option
     */
    function add_option($params)
    {
        $this->db->insert('option',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update option
     */
    function update_option($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('option',$params);
    }
    
    /*
     * function to delete option
     */
    function delete_option($id)
    {
        return $this->db->delete('option',array('id'=>$id));
    }
    
    
    function delete_by_dialog_id($dialogId)
    {
        return $this->db->delete('option',array('dialogId'=>$dialogId));
    }
    
}
