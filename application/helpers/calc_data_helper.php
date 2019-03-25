<?php

defined('BASEPATH') OR exit('No direct script access allowed');



// ------------------------------------------------------------------------

if (!function_exists('inverteData')) {

    /**
     * @param	string
     * @return	string
     */
    function inverteData($data) {
        if (count(explode("/", $data)) > 1) {
            return implode("-", array_reverse(explode("/", $data)));
        } elseif (count(explode("-", $data)) > 1) {
            return implode("/", array_reverse(explode("-", $data)));
        }
    }

}

// ------------------------------------------------------------------------
