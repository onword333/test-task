<?php
 namespace UmiCms\System\Protection;use UmiCms\Service;use UmiCms\System\Request\iFacade;class Security implements iSecurity {private $request;private $configuration;private $csrfProtection;private $hashComparator;public function __construct(iFacade $v10573b873d2fa5a365d558a45e328e47, \iConfiguration $vccd1066343c95877b75b79d47c36bebe,   iCsrfProtection $ve8925c7db313b3366ba6f2d2bd078a83, iHashComparator $v9cb170b1e9321537ce4ae3eaa340f9d4) {$this->setRequest($v10573b873d2fa5a365d558a45e328e47)    ->setConfiguration($vccd1066343c95877b75b79d47c36bebe)    ->setCsrfProtection($ve8925c7db313b3366ba6f2d2bd078a83)    ->setHashComparator($v9cb170b1e9321537ce4ae3eaa340f9d4);}public function checkCsrf() {if (!$this->getConfiguration()->get('kernel', 'csrf_protection')) {return true;}try {$this->checkOrigin();$this->checkReferrer();}catch (\InvalidArgumentException $ve1671797c52e15f763380b45e841ec32) {}catch (\Exception $ve1671797c52e15f763380b45e841ec32) {throw new CsrfException($ve1671797c52e15f763380b45e841ec32->getMessage());}$v10573b873d2fa5a365d558a45e328e47 = $this->getRequest();$v94a08da1fecbb6e8b46990538c7b50b2 = $v10573b873d2fa5a365d558a45e328e47->Post()->get('csrf');$v94a08da1fecbb6e8b46990538c7b50b2 = $v94a08da1fecbb6e8b46990538c7b50b2 ?: $v10573b873d2fa5a365d558a45e328e47->Get()->get('csrf');$this->getCsrfProtection()    ->checkTokenMatch($v94a08da1fecbb6e8b46990538c7b50b2);return true;}public function checkOrigin() {try {return $this->getCsrfProtection()     ->checkOriginCorrect($this->getRequest()->Server()->get('HTTP_ORIGIN'));}catch (CsrfException $ve1671797c52e15f763380b45e841ec32) {throw new OriginException(getLabel('error-no-domain-permissions'));}}public function checkReferrer() {try {return $this->getCsrfProtection()     ->checkReferrerCorrect($this->getRequest()->Server()->get('HTTP_REFERER'));}catch (CsrfException $ve1671797c52e15f763380b45e841ec32) {throw new ReferrerException(getLabel('error-no-domain-permissions'));}}public function hashEquals($v259c8c22a88fafc6406b942136250f03, $v9077a54854311ad32ae36f1803187289) {return $this->getHashComparator()    ->equals($v259c8c22a88fafc6406b942136250f03, $v9077a54854311ad32ae36f1803187289);}private function getRequest() {return $this->request;}private function setRequest(iFacade $v10573b873d2fa5a365d558a45e328e47) {$this->request = $v10573b873d2fa5a365d558a45e328e47;return $this;}private function getConfiguration() {return $this->configuration;}private function setConfiguration(\iConfiguration $vccd1066343c95877b75b79d47c36bebe) {$this->configuration = $vccd1066343c95877b75b79d47c36bebe;return $this;}private function getCsrfProtection() {return $this->csrfProtection;}private function setCsrfProtection(iCsrfProtection $ve8925c7db313b3366ba6f2d2bd078a83) {$this->csrfProtection = $ve8925c7db313b3366ba6f2d2bd078a83;return $this;}private function getHashComparator() {return $this->hashComparator;}private function setHashComparator(iHashComparator $v9cb170b1e9321537ce4ae3eaa340f9d4) {$this->hashComparator = $v9cb170b1e9321537ce4ae3eaa340f9d4;return $this;}public static function getInstance() {return Service::Protection();}}