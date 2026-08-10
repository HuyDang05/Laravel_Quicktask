<?php

if (! function_exists('format_number_space')) {
    function format_number_space($number): string
    {
        
        return number_format((float) $number, 0, '.', ' ');
    }
}