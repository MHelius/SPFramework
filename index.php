<?php

//此部分为PHP配置，如session,error_reporting等


//以下为框架启动
include_once './core/core.php';

//核心类实例化
$core = new Core();

//启动框架
$core->bootstrap();

?>