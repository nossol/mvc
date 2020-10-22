<?php

require('/mnt/c/mvc/src/smarty/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/mnt/c/mvc/src/smarty/templates');
$smarty->setCompileDir('/mnt/c/mvc/src/smarty/templates_c');
$smarty->setCacheDir('/mnt/c/mvc/src/smarty/cache');
$smarty->setConfigDir('/mnt/c/mvc/src/smarty/configs');

$smarty->assign('name', 'Nexus');
$smarty->display('about.tpl');


