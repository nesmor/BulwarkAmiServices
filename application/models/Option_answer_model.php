<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Option_answer_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get option_answer by id
     */
    function get_option_answer($id)
    {
        return $this->db->get_where('option_answer',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all option_answer count
     */
    function get_all_option_answer_count()
    {
        $this->db->from('option_answer');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all option_answer
     */
    function get_all_option_answer($params = array())
    {
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
           
        }
        $this->db->select('*, option_answer.id as oaId, dialog.title as dTitle, dialog.id as dId, option.id as oId, option.title as oTitle,script.title as sTitle'); //Active query bugs. Overwrite same fields name
        $this->db->from('option_answer');
        $this->db->join('option', 'option.id = option_answer.optionId','left outer');
        $this->db->join('dialog', 'dialog.id = option_answer.dialogId');
        $this->db->join('script', 'script.id = option_answer.scriptAnswerId');
        $this->db->order_by('option_answer.cdrId', 'ASC');
        $this->db->order_by('option_answer.id', 'ASC');
        $this->db->order_by('dialog.id', 'ASC');
        
        if(isset($params) && !empty($params) && isset($params['cdrId']) && !empty($params['cdrId']))
        {
            $this->db->where('cdrId',$params['cdrId']);
        }
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new option_answer
     */
    function add_option_answer($params)
    {
        $this->db->insert('option_answer',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update option_answer
     */
    function update_option_answer($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('option_answer',$params);
    }
    
    /*
     * function to delete option_answer
     */
    function delete_option_answer($id)
    {
        return $this->db->delete('option_answer',array('id'=>$id));
    }
}
