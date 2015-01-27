<?php

namespace NSCommons\ServiceFactory\Table;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use NSCommons\Table\CountriesTable;

class CountriesTableFactory implements FactoryInterface {

	public function createService(ServiceLocatorInterface $serviceLocator) {
		$table = new CountriesTable('countries',$serviceLocator->get('Zend\Db\Adapter\Adapter'));
		return $table;
	}
}
