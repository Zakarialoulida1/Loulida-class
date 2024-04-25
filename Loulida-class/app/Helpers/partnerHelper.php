<?php

if (!function_exists('partner')) {
    function partner()
    {
        return auth()->check() ? auth()->user()->partner : null;
    }
}
