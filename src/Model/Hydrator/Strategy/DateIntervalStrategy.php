<?php

namespace NSCommons\Model\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

class DateIntervalStrategy implements StrategyInterface {
	public function extract($interval) {
		if(empty($interval)) return null;
		$date1 = new \DateTime();
		$date2 = new \DateTime();
		$date1->add($interval);
		return $date1->getTimestamp() - $date2->getTimestamp();
	}

	public function hydrate($value) {
		if(empty($value)) return null;
		try {
			$interval = new \DateInterval('PT' . $value . 'S');
		}
		catch(\Exception $e) {
			return null;
		}
		$date1 = new \DateTime();
		$date2 = new \DateTime();
		$date1->add($interval);
		return $date2->diff($date1);
	}
}