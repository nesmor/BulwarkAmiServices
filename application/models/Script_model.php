<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Script_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get script by id
     */
    function get_script($id)
    {
        return $this->db->get_where('script',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all script count
     */
    function get_all_script_count()
    {
        $this->db->from('script');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all script
     */
    function get_all_script($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('script')->result_array();
    }
        
    /*
     * function to add new script
     */
    function add_script($params)
    {
        $this->db->insert('script',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update script
     */
    function update_script($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('script',$params);
    }
    
    /*
     * function to delete script
     */
    function delete_script($id)
    {
        return $this->db->delete('script',array('id'=>$id));
    }
    
    function set_initial_dialog_id($id){
        $this->load->model("Dialog_model");
        $script = $this->get_script($id);
        $dialogs = $this->Dialog_model->get_by_script_by_id_and_secuence($id, 1);
        if(count($dialogs) > 0){
            $script['initialDialogId'] = $dialogs[0]['id'];
        }else{
            $script['initialDialogId'] = 0;
        }
        return $this->update_script($script['id'],$script);
    }
}
