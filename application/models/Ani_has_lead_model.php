<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Ani_has_lead_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get ani_has_lead by id
     */
    function get_ani_has_lead($id)
    {
        return $this->db->get_where('ani_has_lead',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all ani_has_lead
     */
    function get_all_ani_has_lead()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('ani_has_lead')->result_array();
    }
        
    /*
     * function to add new ani_has_lead
     */
    function add_ani_has_lead($params)
    {
        $this->db->insert('ani_has_lead',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update ani_has_lead
     */
    function update_ani_has_lead($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('ani_has_lead',$params);
    }
    
    /*
     * function to delete ani_has_lead
     */
    function delete_ani_has_lead($id)
    {
        return $this->db->delete('ani_has_lead',array('id'=>$id));
    }
}
