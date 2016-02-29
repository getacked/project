<?php

namespace App\Mailers;

use App\User;

class UserMailer extends AppMailer {

	public function sendEmailConfirmation(User $user, $resend = false) {
		$this->to = $user->email;
		if($resend) {
			$this->view = 'emails.welcome';
		}
		else {
			$this->view = 'emails.confirm';
		}
		$this->subject = 'Welcome to Eventure - Please confirm your email.';
		$this->data = compact('user');

		$this->deliver();
	}
}
