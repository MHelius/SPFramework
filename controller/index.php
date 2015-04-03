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

		//$mysql = new Mysql('test','test');

		//$mysql->field(array('*'));
		//$mysql->where(array('id'=>array(4,5)));
		//$res = $mysql->fetchAll();

		//$res = $mysql->insert(array('id'=>1,'tips_id'=>1,'a'=>1,'b'=>1));

		//$res = $mysql->update(array('id'=>1),arary('a'=>1));

		//$res = $mysql->delete(array('id'=>1));

		//var_dump();die;

		//$this->toView();
	}

}

?>