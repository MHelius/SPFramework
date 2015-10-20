SPFramework
============

这是一个十分简洁的PHP框架，创作的目标有:

1.提供最基础最简洁的MVC服务，尽量减少挂载程序，无复杂结构，提高运行效率

2.降低团队成员学习成本（借鉴了SMARTY用法等），使用了普通传统的MVC结构构造以及易读的文件夹名称

3.能够挂载/卸载十分基础的其他服务，例如View视图层组件，MySql语句组件，Redis操作类，MongoDB操作类，MemberCached等

4.SPF类库框架，其优点为：

	1.用时include文件，做到最优效率

	2.自动化加载，使用仅需new object();

	3.统一/可分类管理所有类库

	4.第三方类库加上namespace即可立即使用

	5.自动加载同时提供了强大易用的代码封装/模块化途径
 
已应用到过2个实际项目，项目运行良好，暂未发现其他问题

目前已经支持的组件

1.SQL语句组装类（Mysql）支持读写分离

2.Redis单例类（Redis）

框架重写规则

1.附上apache的重写规则文件

	详见.htaccess文件

2.附上nginx的重写规则
	
	if ($request_filename !~* /(front|admin|index\.php)){
                rewrite ^/(.*)$ /index.php?w=$1 last;
        }	

This project is a Stable Version

This framework‘s name means that "Simple" AND "Practical",Will support the basic tool to use，Maintainable，Low Learning costs

