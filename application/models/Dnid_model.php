<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dnid_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get dnid by id
     */
    function get_dnid($id)
    {
        return $this->db->get_where('dnid',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all dnid count
     */
    function get_all_dnid_count()
    {
        $this->db->from('dnid');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all dnid
     */
    function get_all_dnid($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('dnid')->result_array();
    }
        
    /*
     * function to add new dnid
     */
    function add_dnid($params)
    {
        $this->db->insert('dnid',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update dnid
     */
    function update_dnid($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('dnid',$params);
    }
    
    /*
     * function to delete dnid
     */
    function delete_dnid($id)
    {
        return $this->db->delete('dnid',array('id'=>$id));
    }
}
