<?php
class Autoload {

	/**
	 * 模型自动加载路由规则
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	public function load($class_name)
	{
		$m_dir = MODE.'/'.$class_name.'.php';

		if(file_exists($m_dir))
		{
			include_once $m_dir;
		}
		else
		{
			throw new \Exception("Autoload [".$class_name."]class not in");
		}
	}

}