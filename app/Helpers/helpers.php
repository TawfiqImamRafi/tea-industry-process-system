<?php

if (!function_exists('user_formatted_date')) {
    function user_formatted_date($value = null) {

        $date = date('d M, Y', strtotime($value));

        return $date;
    }
    function database_formatted_date($value = null) {

        $date = date('Y-M-D', strtotime($value));

        return $date;
    }
}
