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
		$v_dir = $this->viewRoute($set_view);

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
            exit;
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
	function viewRoute($set_view)
	{
		//初始化view
		$arr        = $this->getPath();
		$def_view   = $arr['path'].'/'.$arr['func'];
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

	/**
	 * 输出消息
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function showMessage($message,$type = 'error',$return_url = '###',$js = '')
	{
		//会跳页面
		if($return_url == '###')
		{
			$return_js  = 'history.go(-1)';
		}

		switch($type)
		{
			case 'error':$conf = array(

				'backcolor' =>'#f2dede',
				'border'    =>'#ebccd1',
				'title'     =>'失败',
				'textcolor' =>'#a94442',

			);break;
			case 'success':$conf = array(

				'backcolor' =>'#dff0d8',
				'border'    =>'#dff0d8',
				'title'     =>'成功',
				'textcolor' =>'#468847',

			);break;
			case 'warning':$conf = array(

				'backcolor' =>'#fcf8e3',
				'border'    =>'#faebcc',
				'title'     =>'警告',
				'textcolor' =>'#f0ad4e',

			);break;
		}

		if(empty($return_js))
		{
			$jump = 'window.location.href = "'.$return_url.'";';
		}
		else
		{
			$jump = $return_js;
		}

		$default_js = '
				delayURL();
				function delayURL()
				{
					var delay 	= document.getElementById("time").innerHTML;
			        var t 		= setTimeout("delayURL()", 1000);

					if(delay > 0)
					{
						delay--;
						document.getElementById("time").innerHTML = delay;
					}
					else
					{
				        clearTimeout(t);
				        '.$js.$jump.'
					}
				}';


		$div = '
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
		<html>
		<body style="padding-top:40px; padding-bottom:40px; width:99%; text-align:center; font:700 16px/1.5em Arial,Verdana,\'microsoft yahei\';">
			<div style="margin-right:auto; margin-left:auto; width:300px; height:200px; background:'.$conf['backcolor'].'; text-align:center; border:1px solid '.$conf['border'].';">
				<h5 style="color:#A94402; font-weight:normal;">系统消息：'.$conf['title'].'消息</h5>
				<h2 style="color:'.$conf['textcolor'].'; padding:5px 16px; line-height:35px;">'.$message.'</h2>
				<div style=" font-size:10px;">
					<span id="time">1</span>秒钟后跳转...
				</div>
				<script type="text/javascript">
				'.$default_js.'
				</script>
			</div>
		</body>
		</html>';

		//utf-8
		header("Content-type:text/html;charset=utf-8");

		echo $div;exit;
	}

}
?>