<?php
/**
 * Created by helius
 * 配置文件.
 * User: Administrator
 * Date: 15-4-3
 * Time: 上午10:49
 */

return array(
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
	),
	'redis'=>array(
		'0'=>array(
			'host'  =>'127.0.0.1',
			'port'  =>'3306',
		),
	),
);