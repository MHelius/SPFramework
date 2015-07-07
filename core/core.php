<?php

//项目根目录
define("DIRS"	, '.');
define("MODE"	, DIRS."/module");		//逻辑目录
define("VIEW"	, DIRS."/view");		//模板目录
define("CTRL"	, DIRS."/controller");	//控制器目录
define("FROT"	, DIRS."/front");	    //前端目录
define("CONF"	, DIRS."/config");      //配置目录
define("CORE"	, DIRS."/core");        //框架目录

//必选组件
include_once CONF.'/config.php';        //加载配置组件
include_once CORE.'/Route.php';         //加载路由组件
include_once CORE.'/Autoload.php';      //加载自动加载组件

//可选组件
include_once CORE.'/mysql.php';         //加载Mysql快速SQL生成组件
include_once CORE.'/View.php';          //加载视图组件

/**
 * Created by helius
 * 核心类
 * User: Administrator
 * Date: 15-4-3
 * Time: 上午10:22
 */
class Core extends Route{

	private $controller;

	/**
	 * 引导框架开始
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function bootstrap()
	{
		//验证是否登陆
		$this->islogin();

		//自动加载
		$this->autoload();

		//加载控制器
		$this->toController();

		//加载默认视图
		$this->controller->toView();
	}

	/**
	 * 指向控制器
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	private function toController()
	{
		$path = $this->getPath();

		$controller_path = CTRL.'/'.$path['path'].'.php';

		if(file_exists($controller_path))
		{
			//加载控制器
			include_once $controller_path;

			$this->controller = new $path['path']();

			$this->controller->$path['file']();
		}
		else
		{
			throw new \Exception('controller not found');
		}
	}

	/**
	 * 验证是否登陆
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	private function islogin()
	{
		$path = $this->getPath();

		if(!in_array($path['clss'],array('login','index')))
		{
			if(empty($_SESSION['user']))
			{
				//没登陆统一跳至首页
				header('location: /');
			}
		}
		else
		{
			if(!empty($_SESSION['user']))
			{
				//已登陆统一跳至home
				header('location: /home');
			}
		}
	}

	/**
	 * 自动加载
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	private function autoload()
	{
		$autoload_obj = new Autoload();
		spl_autoload_register(array($autoload_obj,'load'));
	}
}

?>