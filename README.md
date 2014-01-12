naptcha
=======
This is a captcha plug-in for CakePHP 2.x. The captcha is generated look like Google's captcha.

The plug-in is based from component: <http://designaeon.com/blog/2012/12/captcha-component-helper-for-cakephp2-x/>

Install
-------
Copy app folder to overwrite your app folder

Load plug-in Naptcha in the bootstrap:

	CakePlugin::load('Naptcha', array('routes' => true));

Usage Example
-------
### Controller ###

Load component and helper in controller:

	public $components = array('Naptcha.Naptcha');
	public $helpers = array('Form', 'Naptcha.Naptcha');

Or load on-the-fly in the controller action:

	$this->Naptcha = $this->Components->load('Naptcha.Naptcha');

In contrller action, create a captcha ID and set it as variable to View

	$captchaId = $this->Naptcha->create();
	$this->set('captchaId', $captchaId);

### View ###

Echo hidden captcha ID input and show captcha image in view:

	echo $this->Form->text('captcha_text');
	echo $this->Form->hidden('captcha_id', array('value' => $captchaId));
	echo $this->Naptcha->image($captchaId, array('id' => 'CaptchaImage');

Show renew action image:

	echo $this->Naptcha->refresh($captchaId, 'CaptchaImage');

### Validate entered captcha code ###
Use method `validate()` in NaptchaComponent to check entered text is correct

	$formData = $this->request->data['YOUR_FORM_MODEL'];// replace by your form model
	if ($this->Naptcha->validate($formData['captcha_id'], $formData['captcha_text'])) {
		// successful
	}
	else {
		// print error
		debug('Error code: ' . $this->Naptcha->errorCode);// values: INVALID | TIMEOUT | NOTMATCHED
		debug('Error message: ' . $this->Naptcha->errorMessage);
	}

Donation
-------
Thank you for using and donation <https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=A2ELKNXDFC4R6&lc=VN&item_name=phuongngoc&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_LG%2egif%3aNonHosted>
