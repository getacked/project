<?php

namespace App\Mailers;

use App\User;
use Illuminate\Http\Request;

class ContactMailer extends AppMailer {

	public function sendContactMessage(Request $request) {
		$this->to = env('CONTACT_EMAIL');
		$this->view = 'emails.contact';
		$this->subject = 'Email from site contact form.';
		$this->data = compact('request');

		$this->deliver();
	}
}
