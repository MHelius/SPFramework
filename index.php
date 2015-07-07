<?php

//此部分为PHP配置，如session,error_reporting等
session_start();

//以下为框架启动
include_once './core/core.php';

//启动框架
$core = new Core();
$core->bootstrap();

?>