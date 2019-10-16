<?php
function check_user_session()
{
       $CI = & get_instance();
       $CI->load->library('session');
       return $CI->session->has_userdata('username');
}

function check_admin_access()
{
    if(!check_user_session()){
        redirect('site/login');
    }
}
?>