<?php
 define('CRON', true);define('PACKER_WORKING_DIR', __DIR__);require_once __DIR__ . '/class/Packer.php';chdir(__DIR__ . '/../../');if (!file_exists('./standalone.php')) {die('Не найден standalone.php.' . PHP_EOL);}require_once 'standalone.php';if (!isset($vb84cdd85c9e3ee904488c933ee1a3e30)) {die('Пакер необходимо запускать через консоль.' . PHP_EOL);}if (!isset($vb84cdd85c9e3ee904488c933ee1a3e30[1])) {die('Первым параметром нужно передать путь до файла конфигурации пакера.' . PHP_EOL);}$vcc87d2cfc5127128ded076ce5e7af0c8 = $vb84cdd85c9e3ee904488c933ee1a3e30[1];try {$v0b0f137f17ac10944716020b018f8126 = new Packer($vcc87d2cfc5127128ded076ce5e7af0c8);$v0b0f137f17ac10944716020b018f8126->setExporter(   new xmlExporter(    $v0b0f137f17ac10944716020b018f8126->getConfig('package')   )  );chdir(dirname(dirname(PACKER_WORKING_DIR)));$v0b0f137f17ac10944716020b018f8126->run();}catch (Exception $ve1671797c52e15f763380b45e841ec32) {die($ve1671797c52e15f763380b45e841ec32->getMessage() . PHP_EOL);}