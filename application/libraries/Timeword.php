<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeword {

	/*
	* CodeIgniter Library of:
	* http://uk.php.net/manual/en/function.time.php#85481
	*
	* Thanks to original author!
	*
	* PHP port of Ruby on Rails famous distance_of_time_in_words method.
	* See http://api.rubyonrails.com/classes/ActionView/Helpers/DateHelper.html for more details.
	*
	* Reports the approximate distance in time between two timestamps. Set include_seconds
	* to true if you want more detailed approximations.
	*
	* Run as:
	* echo $this->timeword->convert($from_time, $to_time);
	*
	*/
	
	function convert($from_time, $to_time = 0, $include_seconds = true) {
		// If no 'To' time provided, use current time.
		if($to_time == 0) { $to_time = time(); }
		
		$distance_in_minutes = round(abs($to_time - $from_time) / 60);
		$distance_in_seconds = round(abs($to_time - $from_time));
	
		if ($distance_in_minutes >= 0 and $distance_in_minutes <= 1) {
			if (!$include_seconds) {
				return ($distance_in_minutes == 0) ? 'less than a minute' : '1 minute';
			} else {
				if ($distance_in_seconds >= 0 and $distance_in_seconds <= 4) {
					return 'less than 5 seconds';
				} elseif ($distance_in_seconds >= 5 and $distance_in_seconds <= 9) {
					return 'less than 10 seconds';
				} elseif ($distance_in_seconds >= 10 and $distance_in_seconds <= 19) {
					return 'less than 20 seconds';
				} elseif ($distance_in_seconds >= 20 and $distance_in_seconds <= 39) {
					return 'half a minute';
				} elseif ($distance_in_seconds >= 40 and $distance_in_seconds <= 59) {
					return 'less than a minute';
				} else {
					return '1 minute';
				}
			}
		} elseif ($distance_in_minutes >= 2 and $distance_in_minutes <= 44) {
			return $distance_in_minutes . ' minutes';
		} elseif ($distance_in_minutes >= 45 and $distance_in_minutes <= 89) {
			return 'about 1 hour';
		} elseif ($distance_in_minutes >= 90 and $distance_in_minutes <= 1439) {
			return 'about ' . round(floatval($distance_in_minutes) / 60.0) . ' hours';
		} elseif ($distance_in_minutes >= 1440 and $distance_in_minutes <= 2879) {
			return '1 day';
		} elseif ($distance_in_minutes >= 2880 and $distance_in_minutes <= 43199) {
			return 'about ' . round(floatval($distance_in_minutes) / 1440) . ' days';
		} elseif ($distance_in_minutes >= 43200 and $distance_in_minutes <= 86399) {
			return 'about 1 month';
		} elseif ($distance_in_minutes >= 86400 and $distance_in_minutes <= 525599) {
			return round(floatval($distance_in_minutes) / 43200) . ' months';
		} elseif ($distance_in_minutes >= 525600 and $distance_in_minutes <= 1051199) {
			return 'about 1 year';
		} else {
			return 'over ' . round(floatval($distance_in_minutes) / 525600) . ' years';
		}
	}
	
	
}
?>