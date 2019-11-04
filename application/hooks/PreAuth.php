<?php

class PreAuth
{
    function checkAuth()
    {
        $_CI = &get_instance();
        if ($_CI->uri->rsegment(2) !== 'login') {
            if (!isset($_CI->session->userdata['logged_in'])) {
                redirect(base_url());
            }
        }
    }
}
