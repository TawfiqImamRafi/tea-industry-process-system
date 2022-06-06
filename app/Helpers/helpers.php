<?php

if (!function_exists('user_formatted_date')) {
    function user_formatted_date($value = null) {

        $date = date('d M, Y', strtotime($value));

        return $date;
    }
    function database_formatted_date($value = null) {

        $date = date('Y-m-d', strtotime($value));

        return $date;
    }
}

if (!function_exists('getGenderType')) {
    function getGenderType()
    {
        $genders = [
            'male' => 'Male',
            'female' => 'Female',
            'other' => 'Others',
        ];

        return $genders;
    }
}
