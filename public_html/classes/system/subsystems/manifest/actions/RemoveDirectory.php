<?php
 class RemoveDirectoryAction extends Action {public function execute() {$v207e5b7e7d2b07f6b19066e8d62f4b1d = $this->getParam('target-directory');$this->removeDirectory($v207e5b7e7d2b07f6b19066e8d62f4b1d);}public function rollback() {}}