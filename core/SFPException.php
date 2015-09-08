<?php
class SFPException {

	/**
	 * SPF异常输出
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	function SPFExceptionHandler($exception)
	{
		//utf-8
		header("Content-type:text/html;charset=utf-8");

		$code       = $exception->getCode();
		$message    = $exception->getMessage();
		$line       = $exception->getLine();
		$file       = $exception->getFile();
		$trac       = $exception->getTraceAsString();

		echo "<h3>SFP ERROR</h3><h4 style='color: #B1191A;'>$message [错误代码:$code]</h4>";
		echo "<h5>错误发生在文件 $file 第 $line 行</h5>";
		echo "<pre style='border: 1px dashed #999999; padding: 5px;'>$trac</pre>";
		echo "<h6>PHP版本： " .PHP_VERSION ." (" .PHP_OS .")</h6>";
	}

}