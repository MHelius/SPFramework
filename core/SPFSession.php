<?php
class SPFSession {

	/**
	 * 获取session
	 *
	 * 详细说明
	 * @形参
	 * @访问      公有
	 * @返回值    void
	 * @throws
	 * helius
	 */
	static function &Session()
	{
		if(session_status() != PHP_SESSION_ACTIVE)
		{
			session_start();
		}

		return $_SESSION;
	}

}