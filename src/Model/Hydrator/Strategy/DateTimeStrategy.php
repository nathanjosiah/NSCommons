<?php

namespace NSCommons\Model\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

class DateTimeStrategy implements StrategyInterface {
	protected $extractionFormat = 'Y-m-d H:i:s';
	protected $extractionTimezone = 'UTC';
	protected $hydrationTimezone = 'UTC';

	public function extract($value) {
		if(!$value) return null;
		if($this->extractionTimezone) {
			$value = clone $value;
			if(!($this->extractionTimezone instanceof \DateTimeZone)) {
				$this->extractionTimezone = new \DateTimeZone($this->extractionTimezone);
			}
			$value->setTimezone($this->extractionTimezone);
		}
		return $value->format($this->extractionFormat);
	}

	public function hydrate($value) {
		if(!$value) return null;
		if($value instanceof \DateTime) {
			return $value;
		}
		if(!($this->hydrationTimezone instanceof \DateTimeZone)) {
			$this->hydrationTimezone = new \DateTimeZone($this->hydrationTimezone);
		}
		$date = new \DateTime($value,$this->hydrationTimezone);
		return $date;
	}

	public function setExtractionFormat($format) {
		$this->extractionFormat = $format;
		return $this;
	}

	/**
	 * @param string|DateTimeZone $timezone
	 */
	public function setExtractionTimezone($timezone) {
		if($timezone) {
			if($timezone instanceof \DateTimeZone) {
				$this->extractionTimezone = $timezone;
			}
			else {
				$this->extractionTimezone = new \DateTimeZone($timezone);
			}
		}
		else {
			$this->extractionTimezone = null;
		}
		return $this;
	}
	/**
	 * @param string|DateTimeZone $timezone
	 */
	public function setHydrationTimezone($timezone) {
		if($timezone) {
			if($timezone instanceof \DateTimeZone) {
				$this->hydrationTimezone = $timezone;
			}
			else {
				$this->hydrationTimezone = new \DateTimeZone($timezone);
			}
		}
		else {
			$this->hydrationTimezone = null;
		}
		return $this;
	}
}
