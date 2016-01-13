<?php defined('SYSPATH') OR die('No direct access allowed.');


switch(Kohana::$environment)
{
	case Kohana::DEVELOPMENT:
		return array
		(
			'default' => array
			(
				'type'       => 'MySQLi',
				'connection' => array(

					'hostname'   => 'localhost',
					'database'   => 'canon',
					'username'   => 'root',
					'password'   => 'toor',
					'persistent' => FALSE,
				),
				'table_prefix' => '',
				'charset'      => 'utf8',
				'caching'      => FALSE,
				'profiling'    => TRUE,
			),
		);
	break;
		
	case Kohana::PRODUCTION:
		default:
			return array
			(
				'default' => array
				(
					'type'       => 'MySQLi',
					'connection' => array(

						'hostname'   => '',
						'database'   => '',
						'username'   => '',
						'password'   => '',
						'persistent' => FALSE,
					),
					'table_prefix' => '',
					'charset'      => 'utf8',
					'caching'      => FALSE,
					'profiling'    => TRUE,
				),
			);
		break;
}