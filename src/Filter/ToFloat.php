<?php

namespace NSCommons\Filter;

use Zend\Filter\AbstractFilter;

class ToFloat extends AbstractFilter {
	public function filter($value) {
		$value = preg_replace('/(.*?)[.,](\d+)$/','$1~$2',$value);
		$value = preg_replace('/[^\d~-]/','',$value);
		$value = (float)str_replace('~','.',$value);
		return $value;
	}

}