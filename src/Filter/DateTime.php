<?php

namespace NSCommons\Filter;

use Zend\Filter\AbstractFilter;

class DateTime extends AbstractFilter {
	protected $allowEmpty = true;

	public function filter($value) {
		if(empty($value) && !$this->allowEmpty) {
			return null;
		}

		try {
			return new \DateTime($value);
		}
		catch(\Exception $e) {
			return null;
		}
	}

	/**
	 * @param $empty Whether or not the filter should return null if no data was given.
	 */
	public function setAllowEmpty($empty) {
		$this->allowEmpty = (bool)$empty;
		return $this;
	}
}

