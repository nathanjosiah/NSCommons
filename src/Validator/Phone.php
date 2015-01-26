<?php

namespace NSCommons\Validator;

use Zend\Validator\AbstractValidator;

class Phone extends AbstractValidator {
	const MESSAGE_INVALID = 'invalid';
	protected $messageTemplates = [
		self::MESSAGE_INVALID => 'The phone number supplied is invalid.'
	];
	protected $options = [
		'country' => 'US'
	];

	public function isValid($value) {
		$country = $this->getOption('country');
		$filter = new \NSCommons\Filter\Phone();
		$valid = $filter->isValidPhoneNumber($value,$country);

		if(!$valid) {
			$this->error(self::MESSAGE_INVALID);
		}
		return $valid;
	}
}
