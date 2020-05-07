<?php
class percentage {
    var $rate_left;
	var $rate_right;
	function rate($rate) {
		if ($rate > 100 and $rate <= 1000) {
			$this->rate_left = round($rate/10);
			$this->rate_right = round(100 - $this->rate_left);
			}
		if ($rate > 1000) {
			$this->rate_left = 100;
			$this->rate_right = 0;
			}
		if ($rate <= 100) {
			$this->rate_left = $rate;
			$this->rate_right = 100 - $this->rate_left;
		}
		if ($rate < 0) {
			$this->rate_left = 0;
			$this->rate_right = 100;
		}
	}
}
?>