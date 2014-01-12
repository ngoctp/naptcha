<?php
/**
 * 
 * @author NgocTP
 * @property NaptchaComponent $Naptcha
 */
class NaptchaController extends NaptchaAppController {
	public $uses = false;
	
	public function beforeFilter() {
		$this->Auth->allow('show');
	}
	
	/** Show the image to browser */
	public function show($id) {
		$this->Naptcha = $this->Components->load('Naptcha.Naptcha');
		$this->Naptcha->image($id);
		$this->render(false, false);
	}
	
	/**
	 * Test showing captcha
	 */
// 	public function test() {
// 		$this->Naptcha = $this->Components->load('Naptcha.Naptcha');
// 		$this->redirect('/naptcha/show/' . $this->Naptcha->create());
// 	}
	
}
