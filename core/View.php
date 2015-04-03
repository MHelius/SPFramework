<?php
/**
 * Created by helius
 * 视图层
 * User: Administrator
 * Date: 15-4-3
 * Time: 上午10:22
 */
class View extends Route{

	//视图参数
	private $pamas = array();

	/**
	 * 指向视图
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function toView($set_view = NULL)
	{
		$v_dir = $this->view_route($set_view);

		if(file_exists($v_dir))
		{
			//参数赋值
			if(!empty($this->pamas))
			{
				foreach($this->pamas AS $k=>$row)
				{
					$$k = $row;
				}
			}

			//utf-8
			header("Content-type:text/html;charset=utf-8");

			//加载
			include_once $v_dir;
		}
		else
		{
			throw new \Exception('view not found');
		}
	}

	/**
	 * 视图加载路由规则
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function view_route($set_view)
	{
		//初始化view
		$arr        = $this->getPath();
		$def_view   = $arr['path'].'/'.$arr['file'];
		$view       = empty($set_view)?$def_view:$set_view;

		//加载模板
		return VIEW.'/'.$view.'.php';
	}

	/**
	 * 参数赋值
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function assign($key,$value)
	{
		$this->pamas[$key] = $value;
	}

}
?>