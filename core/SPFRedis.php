<?php
class SPFRedis extends Config{

	protected $db;
	protected $redis;

	static $rediss;

	/**
	 * 构造函数
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function __construct($db)
	{
		$this->db = $db;
	}

	/**
	 * 获取redis对象
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function redis()
	{
		//获取配置
		$conf = parent::$config['redis'][$this->db];

		if(!empty(self::$rediss[$this->db]))
		{
			$this->redis = self::$rediss[$this->db];
		}
		else
		{
			$this->redis = self::$rediss[$this->db] = new Redis();
			$this->redis->connect($conf['host'],$conf['port']);
		}
	}

}