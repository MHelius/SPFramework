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
	public $path        = array();

	function getPath()
	{

		if(!empty($this->path))
		{
			return $this->path;
		}

		$url = array();

		$_SERVER['REQUEST_URI'] = explode('?',$_SERVER['REQUEST_URI']);
		$_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'][0];

		if(!empty($_SERVER['REQUEST_URI']))
		{
			$r_url  = strtolower($_SERVER['REQUEST_URI']);
			$url    = explode('/',$r_url);
			unset($url[0]);
		}

		//控制器识别优先
		$count = count($url);

		if($count == 1)
		{
			$path    = implode('/',$url);
		}
		elseif($count > 1)
		{
			$file    = array_pop($url);
			$path    = implode('/',$url);
		}

		$f_file = empty($file)?$this->def_file:$file;
		$f_path = empty($path)?$this->def_path:$path;
		$f_clss = explode('/',$f_path);
		$f_clss = array_pop($f_clss);

		return $this->path = array(
			'file'  => $f_file,
			'path'  => $f_path,
			'clss'  => $f_clss,
		);
	}

}