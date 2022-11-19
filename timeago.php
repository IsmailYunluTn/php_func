<?php
    class timeAgoClass
    {
        public function __construct(
            public string $year = "year",
            public string $mounth = "mounth",
            public string $week = "week",
            public string $day = "day",
            public string $hour = "hour",
            public string $minute = "minute",
            public string $second = "second"
        ){
            $this->year = $year;
            $this->mounth = $mounth;
            $this->day = $day;
            $this->hour = $hour;
            $this->minute = $minute;
            $this->second = $second;
        }

        public function timeAgo($old_time, $time = null)
        {
            if ($time == null)
                $time = time();
            else
                $time = strtotime($time);
        
            $old_time = strtotime($old_time);
            $old_time = $time - $old_time;
            $old_time = ($old_time< 1)? 1 : $old_time;
            
            $tokens = array(
                31536000 => $this->year,
                2592000 => $this->mounth,
                604800 => $this->day,
                86400 => $this->week,
                3600 => $this->hour,
                60 => $this->minute,
                1 => $this->second
            );

            $values = array();
    
            while ($old_time > 0) {
                foreach ($tokens as $unit => $text) {
                    if ($old_time < $unit) continue;
                    $numberOfUnits = floor($old_time / $unit);
                    $values[$text] = $numberOfUnits;
                    $old_time -= $unit * $numberOfUnits;
                    break;
                }
            }
            return $values;
        }
    }
?>
