<?php
    require_once('Smarty/Smarty.class.php');
    $Smarty = new Smarty();
    $Smarty->setTemplateDir('prikaz');

    $zahtev = trim(@$_REQUEST['akcija']);
    if($zahtev == '') $zahtev = 'home';

    require_once('logika/'. $zahtev . '.logika.php');

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $Rezultat = izvrsavanje();
        $Smarty->assign('Magacini', $Rezultat);
        $Smarty->display($zahtev . '.tpl');
    } else {
        izvrsavanje();
    }