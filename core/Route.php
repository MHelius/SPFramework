<?php
/**
 * Created by helius
 * URL路由解析
 * User: Administrator
 * Date: 15-4-3
 * Time: 上午10:22
 */
class Route{

	public $def_path    = 'index';
	public $def_file    = 'index';
	public $def_clss    = 'index';
	public $path        = array();

	/**
	 * 解析URL
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function getPath()
	{

		if(!empty($this->path))
		{
			return $this->path;
		}

		$path   = '';
		$url    = array();

		//推荐使用path_info，性能更佳
		if(isset($_SERVER['PATH_INFO']))
		{
			$path = $_SERVER['PATH_INFO'];
		}
		//其次选择request_uri参数，性能差
		elseif(isset($_SERVER['REQUEST_URI']))
		{
			$path = $_SERVER['REQUEST_URI'];
			$path = explode('?',$path);
			$path = $path[0];
		}
		else
		{
			throw new \Exception('Server Don`t Have REQUEST_URI or PATH_INFO');
		}

		$path   = strtolower($path);
		$url    = explode('/',$path);
		unset($url[0]);

		$f_file = array_pop($url);
		$f_path = implode('/',$url);
		$f_clss = end($url);

		return $this->path = array(
			'file'  => empty($f_file)?$this->def_file:$f_file,
			'path'  => empty($f_path)?$this->def_path:$f_path,
			'clss'  => empty($f_clss)?$this->def_clss:$f_clss,
		);
	}

}