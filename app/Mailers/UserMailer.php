<?php

namespace App\Mailers;

use App\User;

class UserMailer extends AppMailer {

	public function sendEmailConfirmation(User $user) {
		$this->to = $user->email;
		$this->view = 'emails.confirm';
		$this->subject = 'Welcome to Eventure - Please confirm your email.';
		$this->data = compact('user');

		$this->deliver();
	}
}
