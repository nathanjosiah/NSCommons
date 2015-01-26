<?php

namespace NSCommons\Filter;
use Zend\Filter\AbstractFilter;
class Slug extends AbstractFilter {
	public function filter($value) {
		$value = trim(strtolower($value),' ');
		$value = preg_replace('/[^a-z0-9-]/','-',$value);
		$value = trim($value,'-');
		$value = preg_replace('/--+/','',$value);
		if(!$value) return null;
		return $value;
	}
}
