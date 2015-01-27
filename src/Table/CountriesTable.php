<?php

namespace NSCommons\Table;

use Zend\Db\TableGateway\TableGateway;
class CountriesTable extends TableGateway {
	public function fetchAll() {
		$countries = [];
		$result = $this->select();

		foreach($result as $country) {
			$countries[] = $country;
		}

		return $countries;
	}

	public function fetchCountryByAlpha3($alpha3) {
		$result = $this->select(['alpha3' => $alpha3]);
		if($result->count()) {
			return $result->current();
		}
		return null;
	}
}
