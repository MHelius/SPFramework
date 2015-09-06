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
		/* output test */
		$this->assign('test',\test_module\tools::get());

		/* mysql query test */
		//$mysql = new Mysql('test','member');
		//$mysql->field(array('*'));
		//$mysql->where(array('id'=>array(4,5)));
		//$res = $mysql->fetchAll();

		/* mysql insert test */
		//$res = $mysql->insert(array('val'=>'xxxx'));

		/* mysql update test */
		//$res = $mysql->update(array('id'=>1),array('val'=>'vvvvvvv'));

		/* mysql delete test */
		//$res = $mysql->delete(array('id'=>1));

		/* redis test */
		//$redis = new Redish(0);
		//$redis->redis()->set('xx','xx');

		/* view test */
		//$this->toView();
	}

}

?>