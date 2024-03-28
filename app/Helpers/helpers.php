<?php

use Carbon\Carbon;

if (!function_exists('get_ymd')) {
    /**
     * Get date in "Y-m-d" format
     *
     * @param  string|null  $date
     * @return string|null
     */
    function get_ymd(string $date = null): string | null
    {
        return !empty($date) ? Carbon::createFromFormat("Y-m-d",$date)->format('Y-m-d') : null;
    }

}
