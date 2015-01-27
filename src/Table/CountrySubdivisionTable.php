<?php

namespace NSCommons\Table;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class CountrySubdivisionTable extends TableGateway {
	public function fetchSubdivisionsByCountryId($country_id) {
		$subdivisions = $this->select(['id' => $country_id]);
		return $subdivisions;
	}
	public function fetchSubdivisionsByCountryAlpha3($alpha3) {
		$subdivisions = $this->select(function(Select $select) use ($alpha3) {
			$select->where(['country' => $alpha3])->order('name ASC');
			return $select;
		});
		return $subdivisions;
	}
}
