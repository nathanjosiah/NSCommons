<?php
namespace NSCommons;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements AutoloaderProviderInterface,ConfigProviderInterface {
	public function getAutoloaderConfig() {
		return [
			'Zend\Loader\StandardAutoloader' => [
				'namespaces' => [
					__NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\','/',__NAMESPACE__)
				]
			]
		];
	}
	public function getConfig() {
		return include __DIR__ . '/../config/module.config.php';
	}
}
