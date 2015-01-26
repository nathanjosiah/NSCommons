<?php

namespace NSCommons\Filter;

use Zend\Filter\AbstractFilter;

class ValidDateTime extends AbstractFilter {

	public function filter($value) {
		try {
			new \DateTime($value);
			return $value;
		}
		catch(\Exception $e) {
			return null;
		}
	}
}

