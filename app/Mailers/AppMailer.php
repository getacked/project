<?php

namespace App\Mailers;

use App\User;
use Illuminate\Mail\Mailer;

abstract class AppMailer {

	protected $mailer;

	protected $to;

	protected $subject;

	protected $view;

	protected $data = [];

	public function __construct(Mailer $mailer) {
		$this->mailer = $mailer;
	}

	public function deliver() {
		$this->mailer->send($this->view, $this->data, function($message) {
			$message->to($this->to)
					->subject($this->subject);
		});
	}
}

