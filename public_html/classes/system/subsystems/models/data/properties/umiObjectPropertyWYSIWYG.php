<?php
 use UmiCms\Service;class umiObjectPropertyWYSIWYG extends umiObjectPropertyText {protected function loadValue() {$v9b207167e5381c47682c6b4f58a623fb = [];$v945100186b119048837b9859c2c46410 = $this->field_id;$v8d777f385d3dfec8815d20f7496026dc = $this->getPropData();$vaf1428bbee3eefc2cd740bbe73d5c56a = Service::EmojiTranslator();if ($v8d777f385d3dfec8815d20f7496026dc) {foreach ($v8d777f385d3dfec8815d20f7496026dc['text_val'] as $v3a6d0284e743dc4a9b86f97d6dd1a3bf) {if ($v3a6d0284e743dc4a9b86f97d6dd1a3bf === null) {continue;}if (str_replace('&nbsp;', '', trim($v3a6d0284e743dc4a9b86f97d6dd1a3bf)) == '') {continue;}$v9b207167e5381c47682c6b4f58a623fb[] = (string) $vaf1428bbee3eefc2cd740bbe73d5c56a->fromShortNameToUnicode($v3a6d0284e743dc4a9b86f97d6dd1a3bf);}return $v9b207167e5381c47682c6b4f58a623fb;}$v4717d53ebfdfea8477f780ec66151dcb = $this->getConnection();$v80071f37861c360a27b7327e132c911a = $this->getTableName();$vac5c74b64b4b8352ef2f181affb5ac2a = "SELECT text_val FROM {$v80071f37861c360a27b7327e132c911a} WHERE obj_id = '{$this->object_id}' AND field_id = '{$v945100186b119048837b9859c2c46410}' LIMIT 1";$result = $v4717d53ebfdfea8477f780ec66151dcb->queryResult($vac5c74b64b4b8352ef2f181affb5ac2a);$result->setFetchType(IQueryResult::FETCH_ROW);foreach ($result as $vf1965a857bc285d26fe22023aa5ab50d) {$v3a6d0284e743dc4a9b86f97d6dd1a3bf = array_shift($vf1965a857bc285d26fe22023aa5ab50d);if ($v3a6d0284e743dc4a9b86f97d6dd1a3bf === null) {continue;}if (str_replace('&nbsp;', '', trim($v3a6d0284e743dc4a9b86f97d6dd1a3bf)) == '') {continue;}$v9b207167e5381c47682c6b4f58a623fb[] = (string) $vaf1428bbee3eefc2cd740bbe73d5c56a->fromShortNameToUnicode($v3a6d0284e743dc4a9b86f97d6dd1a3bf);}return $v9b207167e5381c47682c6b4f58a623fb;}protected function saveValue() {foreach ($this->value as $v865c0c0b4ab0e063e5caa3387c1a8741 => $v2063c1608d6e0baf80249c42e2be5804) {$v2063c1608d6e0baf80249c42e2be5804 = str_replace(['&lt;!--', '--&gt;'], ['<!--', '-->'], $v2063c1608d6e0baf80249c42e2be5804);$v2063c1608d6e0baf80249c42e2be5804 = preg_replace('/<!--\[if(.*?)>(.*?)<!(-*)\[endif\][\s]*-->/mis', '', $v2063c1608d6e0baf80249c42e2be5804);$this->value[$v865c0c0b4ab0e063e5caa3387c1a8741] = $v2063c1608d6e0baf80249c42e2be5804;}parent::saveValue();}protected function isNeedToSave(array $v7f7cfde5ec586119b48911a2c75851e5) {$v0382b9fd9ef50b6a335f35e0aaaebf99 = $this->value;if (isset($v0382b9fd9ef50b6a335f35e0aaaebf99[0])) {$v0382b9fd9ef50b6a335f35e0aaaebf99 = (string) $v0382b9fd9ef50b6a335f35e0aaaebf99[0];}else {$v0382b9fd9ef50b6a335f35e0aaaebf99 = '';}if (isset($v7f7cfde5ec586119b48911a2c75851e5[0])) {$v7f7cfde5ec586119b48911a2c75851e5 = (string) $v7f7cfde5ec586119b48911a2c75851e5[0];$v7f7cfde5ec586119b48911a2c75851e5 = str_replace(['&lt;!--', '--&gt;'], ['<!--', '-->'], $v7f7cfde5ec586119b48911a2c75851e5);$v7f7cfde5ec586119b48911a2c75851e5 = preg_replace('/<!--\[if(.*?)>(.*?)<!(-*)\[endif\][\s]*-->/mis', '', $v7f7cfde5ec586119b48911a2c75851e5);$v7f7cfde5ec586119b48911a2c75851e5 = ($v7f7cfde5ec586119b48911a2c75851e5 === '<p />' || $v7f7cfde5ec586119b48911a2c75851e5 === '&nbsp;') ? '' : $v7f7cfde5ec586119b48911a2c75851e5;}else {$v7f7cfde5ec586119b48911a2c75851e5 = '';}return $v0382b9fd9ef50b6a335f35e0aaaebf99 !== $v7f7cfde5ec586119b48911a2c75851e5;}}