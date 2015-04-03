<?php

class index extends View{

	/**
	 * 测试控制器
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function index()
	{
		$this->assign('test','This is SPF Hello World');

		$this->toView();
	}

}

?>