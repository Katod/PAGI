#!/usr/bin/env php
<?php
declare(ticks=1);

date_default_timezone_set('America/Buenos_Aires');
require_once __DIR__ . '/example.php';

use PAGI\Client\Impl\ClientImpl as PagiClient;

// Go, go, gooo!
$pagiClientOptions = array();
$pagiClient = PagiClient::getInstance($pagiClientOptions);
$pagiAppOptions = array(
    'pagiClient' => $pagiClient,
);
$pagiApp = new MyPagiApplication($pagiAppOptions);
pcntl_signal(SIGHUP, array($pagiApp, 'signalHandler'));
$pagiApp->init();
$pagiApp->run();