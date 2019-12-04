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

            if ($_CI->uri->rsegment(1) == 'dashboard') {
                if ($_CI->session->userdata['logged_in']['Level'] !== 'sa') {
                    $base = base_url("home");
                    echo    "<script type='text/javascript'>
                                alert('Anda Tidak Memiliki Akses ke dasboard');
                                window.location =  '" . $base . "';
                            </script>";
                }
            }
        }
    }
}
