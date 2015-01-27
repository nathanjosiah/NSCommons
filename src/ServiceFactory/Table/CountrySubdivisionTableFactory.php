<?php

namespace NSCommons\ServiceFactory\Table;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use NSCommons\Table\CountrySubdivisionTable;

class CountrySubdivisionTableFactory implements FactoryInterface {

	public function createService(ServiceLocatorInterface $serviceLocator) {
		$table = new CountrySubdivisionTable('country_subdivisions',$serviceLocator->get('Zend\Db\Adapter\Adapter'));
		return $table;
	}
}

