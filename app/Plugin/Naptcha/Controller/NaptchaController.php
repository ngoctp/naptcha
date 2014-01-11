<?php
/**
 * 
 * @author NgocTP
 * @property NaptchaComponent $Naptcha
 */
class NaptchaController extends NaptchaAppController {
	public $uses = false;
	
	public function beforeFilter() {
		$this->Auth->allow('index');
	}
	
	public function index($id) {
		$this->Naptcha = $this->Components->load('Naptcha.Naptcha');
		$this->Naptcha->image($id);
		$this->render(false, false);
	}
}
