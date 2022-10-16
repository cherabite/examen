<?php

class Pdf {

    function Pdf() {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    function load($param = NULL) {
        require_once APPPATH .'third_party/mpdf/mpdf/mpdf.php';

        if ($param == NULL) {
          $param = '"ar","A4","5","utf8",0,0,0,0,0,0';
        }
        return new mPDF($param);
    }

}