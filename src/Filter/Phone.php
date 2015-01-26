<?php

namespace NSCommons\Filter;

use Zend\Filter\AbstractFilter;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;

class Phone extends AbstractFilter {
	const FORMAT_INTERNATIONAL = PhoneNumberFormat::INTERNATIONAL;
	const FORMAT_E164 = PhoneNumberFormat::E164;
	const FORMAT_NATIONAL = PhoneNumberFormat::NATIONAL;
	const FORMAT_RFC3966 = PhoneNumberFormat::RFC3966;

	protected $util;

	protected $options = [
		'country' => 'US',
		'format' => self::FORMAT_INTERNATIONAL
	];

	public function filter($value) {
		$options = $this->getOptions();
		try {
			$util = $this->getUtil();
			$phone = $util->parse($value,$options['country']);
			return $this->getUtil()->format($phone,$options['format']);
		}
		catch(\Exception $e) {
			return null;
		}
	}

	public function isValidPhoneNumber($value,$country) {
		try {
			$util = $this->getUtil();
			$phone = $util->parse($value,$country);
			return $util->isValidNumber($phone);
		}
		catch(\Exception $e) {
			return true;
		}
	}

	protected function getUtil() {
		if(!$this->util) {
			$this->util = PhoneNumberUtil::getInstance();
		}
		return $this->util;
	}
}
