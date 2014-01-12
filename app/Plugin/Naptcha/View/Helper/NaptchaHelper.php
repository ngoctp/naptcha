<?php
App::uses('AppHelper', 'View/Helper');

/**
 * 
 * @author NgocTP
 * @property HtmlHelper $Html
 * @property FormHelper $Form
 */
class NaptchaHelper extends AppHelper {
	public $helpers = array('Html', 'Form');
	
	public function image($id, $options = array()) {
		$options += array('onclick' => 'this.src = "'.$this->Html->url('/naptcha/show/'.$id).'?r=" + Math.random()', 'alt' => _('Verification image'), 'style' => 'cursor:pointer');
		return $this->Html->image('/naptcha/show/'.$id, $options);
	}
	
	public function refresh($id, $img_id, $options = array()) {
		$options += array('onclick' => 'document.getElementById("'.$img_id.'").src = "'.$this->Html->url('/naptcha/show/'.$id).'?r=" + Math.random()', 'alt' => _('Renew verification image'), 'style' => 'cursor:pointer');
		return $this->Html->image('/naptcha/images/refresh.png', $options);
	}
	
}
