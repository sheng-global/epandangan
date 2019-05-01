<?php

class Date_helper {
	
	// time ago
	function prettyDate($date){
		$time = strtotime($date); 
		$now = time(); 
		$ago = $now - $time; 
		if($ago < 60){
			$when = round($ago); 
			$s = ($when == 1)?"second":"seconds"; 
			return "$when $s ago"; 
		}elseif($ago < 3600){
			$when = round($ago / 60); 
			$m = ($when == 1)?"minute":"minutes"; 
			return "$when $m ago"; 
		}elseif($ago >= 3600 && $ago < 86400){
			$when = round($ago / 60 / 60); 
			$h = ($when == 1)?"hour":"hours"; 
			return "$when $h ago"; 
		}elseif($ago >= 86400 && $ago < 2629743.83){
			$when = round($ago / 60 / 60 / 24); 
			$d = ($when == 1)?"day":"days"; 
			return "$when $d ago"; 
		}elseif($ago >= 2629743.83 && $ago < 31556926){
			$when = round($ago / 60 / 60 / 24 / 30.4375); 
			$m = ($when == 1)?"month":"months"; 
			return "$when $m ago";
		}else{
			return date('d M Y',strtotime($date)); 
		} 
	}

	/** time difference
	*
	* $from = strtotime($start_date); // tarikh mula
	* $to = strtotime($end_date); //tarikh akhir
	* echo daysTo($from, $to, false);
	*
	**/

	function daysTo($from, $to)
	{
		$start = date_create($from);
		$end = date_create($to);
		$interval = date_diff($start, $end);
		return $interval->d;
	} 

	/** time ago v2
	*
	* echo time2str($from);
	*
	**/
	function time2str($ts) {
	    if(!ctype_digit($ts)) {
	        $ts = strtotime($ts);
	    }
	    $diff = time() - $ts;
	    if($diff == 0) {
	        return 'now';
	    } elseif($diff > 0) {
	        $day_diff = floor($diff / 86400);
	        if($day_diff == 0) {
	            if($diff < 60) return 'just now';
	            if($diff < 120) return '1 minute ago';
	            if($diff < 3600) return floor($diff / 60) . ' minutes ago';
	            if($diff < 7200) return '1 hour ago';
	            if($diff < 86400) return floor($diff / 3600) . ' hours ago';
	        }
	        if($day_diff == 1) { return 'Yesterday'; }
	        if($day_diff < 7) { return $day_diff . ' days ago'; }
	        if($day_diff < 31) { return ceil($day_diff / 7) . ' weeks ago'; }
	        if($day_diff < 60) { return 'last month'; }
	        return date('F Y', $ts);
	    } else {
	        $diff = abs($diff);
	        $day_diff = floor($diff / 86400);
	        if($day_diff == 0) {
	            if($diff < 120) { return 'in a minute'; }
	            if($diff < 3600) { return 'in ' . floor($diff / 60) . ' minutes'; }
	            if($diff < 7200) { return 'in an hour'; }
	            if($diff < 86400) { return 'in ' . floor($diff / 3600) . ' hours'; }
	        }
	        if($day_diff == 1) { return 'Tomorrow'; }
	        if($day_diff < 4) { return date('l', $ts); }
	        if($day_diff < 7 + (7 - date('w'))) { return 'next week'; }
	        if(ceil($day_diff / 7) < 4) { return 'in ' . ceil($day_diff / 7) . ' weeks'; }
	        if(date('n', $ts) == date('n') + 1) { return 'next month'; }
	        return date('F Y', $ts);
	    }
	}

	// function to convert timestamp string and print 
    function convertTimestamp($str) 
    {
        $date = date('j M Y g:i A', strtotime($str)); 
        return $date; 
    }

    // function to convert date format only
    function convertDate($str) 
    {
    	if(isset($str)){
    		$date = date('j M Y', strtotime($str));
        	return $date;
        }else{
        	return 'N/A';
        }
    }

    // function to convert date format only
    function convertISO($str) 
    {
        $date = date('j M Y', $str); 
        return $date; 
    }

    // function to convert timestamp string and print 
    function convertTime($str) 
    {
        $date = date('g:i A', strtotime($str)); 
        return $date; 
    }

}