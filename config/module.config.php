<?php
return [
	'service_manager' => [
		'factories' => [
			'NSCommons\Table\CountrySubdivisionTable' => 'NSCommons\ServiceFactory\Table\CountrySubdivisionTableFactory',
			'NSCommons\Table\CountriesTable' => 'NSCommons\ServiceFactory\Table\CountriesTableFactory',
		]
	]
];