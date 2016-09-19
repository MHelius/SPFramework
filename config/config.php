<?php
/**
 * Created by helius
 * 配置文件类.
 * User: Administrator
 * Date: 15-4-3
 * Time: 上午10:49
 */
class Config{

	static $config = array(
		'mysql'=>array(
			'test'=>array(
				'host'  =>'127.0.0.1',
				'port'  =>'3306',
				'user'  =>'root',
				'pass'  =>'',
				'config'=>array(
					\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';",
				)
			),
			'test2'=>array(
				'read'=>array(
					//权重值，仅支持所有数据之和 <= 10
					'8'=>array(
						'host'  =>'127.0.0.1',
						'port'  =>'3306',
						'user'  =>'root',
						'pass'  =>'',
						'config'=>array(
							\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';",
						)
					),
					'2'=>array(
						'host'  =>'127.0.0.1',
						'port'  =>'3306',
						'user'  =>'root',
						'pass'  =>'',
						'config'=>array(
							\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';",
						)
					),
				),
				'write'=>array(
					'host'  =>'127.0.0.1',
					'port'  =>'3306',
					'user'  =>'root',
					'pass'  =>'',
					'config'=>array(
						\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';",
					)
				),
			),
		),
		'redis'=>array(
			'0'=>array(
				'host'  =>'127.0.0.1',
				'port'  =>'3306',
			),
		),
	);
}