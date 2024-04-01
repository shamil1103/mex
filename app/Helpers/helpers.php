<?php

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

if (!function_exists('get_ymd')) {
    /**
     * Get date in "Y-m-d" format
     *
     * @param  string|null  $date
     * @return string|null
     */
    function get_ymd(string $date = null): ?string
    {
        return !empty($date) ? Carbon::createFromFormat("Y-m-d", $date)->format('Y-m-d') : null;
    }

}

if (!function_exists('uploadFile')) {

    /**
     * Upload file
     *
     * @param UploadedFile $file
     * @param string|null $folder
     * @return string|null
     */
    function uploadFile(UploadedFile $file, ?string $folder = null): ?string
    {

        if (!empty($file)) {
            $extension = $file->getClientOriginalExtension();
            $filename  = time() . '.' . $extension;
            $file->move(public_path('uploads/' . $folder), $filename);

            return 'uploads/' . $folder . $filename;
        }

        return null;

    }

}

if (!function_exists('removeFile')) {

    /**
     * Upload file
     *
     * @param string $filePath
     * @return bool
     */
    function removeFile(string $filePath): bool
    {

        if (file_exists(public_path($filePath))) {
            return unlink(public_path($filePath));
        }

        return false;

    }

}

if (!function_exists('dateTimeRangeDateCovert')) {

    function dateTimeRangeDateCovert($date = null, $dateFormate = "Y-m-d")
    {
        if ($date && count(explode("-", $date)) == 2) {
            $dateTimeRange = explode("-", $date);
            $from_date     = date($dateFormate, strtotime($dateTimeRange[0]));
            $to_date       = date($dateFormate, strtotime($dateTimeRange[1]));
        } else {
            $from_date = date($dateFormate);
            $to_date   = date($dateFormate);
        }

        return [$from_date, $to_date];
    }

}
