<?php

//此部分为PHP统一配置部分，如error_reporting等
error_reporting(E_ALL ^ E_NOTICE);

//以下为框架启动
include_once './core/Core.php';

//启动框架
$core = new Core();
$core->bootstrap();

?>