//accepts a number of milliseconds (float value included), and converts it to other formats
    //returns array() of formatted times
    public function reconfigure_time($milliseconds){
        $original_milliseconds = $milliseconds;
        $seconds = floor($milliseconds / 1000);
        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
        $milliseconds = $milliseconds % 1000;
        $seconds = $seconds % 60;
        $minutes = $minutes % 60;

        $full_time_format = '%u:%02u:%02u.%03u';
        $hours_format = '%u';
        $millisecond_format = '%03u';
        $time_format = '%02u:%02u';
        $time_no_colon = '%02u%02u';
        $minute_second_format = '%02u';
        $total_seconds_w_fraction = ($minutes * 60) + $seconds .".". sprintf($millisecond_format,$milliseconds);
        $total_seconds = ($minutes * 60) + $seconds;
        $time_arr = [
            'hours'=>sprintf($hours_format, $hours),
            'minutes'=>sprintf($minute_second_format, $minutes),
            'seconds'=>sprintf($minute_second_format, $seconds),
            'milliseconds'=>sprintf($millisecond_format,$milliseconds),
            'total_seconds'=>$total_seconds,
            'total_seconds_w_fraction'=>$total_seconds_w_fraction,
            'formatted_time'=>sprintf($time_format, $minutes,$seconds),
            'time'=>sprintf($full_time_format, $hours, $minutes, $seconds, $milliseconds),
            'original_milliseconds'=>$original_milliseconds,
            'time_no_colon'=>sprintf($time_no_colon,$minutes,$seconds),

        ];

        return $time_arr;
    }
