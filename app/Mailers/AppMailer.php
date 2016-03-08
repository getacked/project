<?php

namespace App\Mailers;

use DB;
use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Http\Request;
use App\Event;

class AppMailer {

	private $mailer;

	private $to;

	private $subject;

	private $view;

	private $data = [];

	public function __construct(Mailer $mailer) {
		$this->mailer = $mailer;
	}

	public function deliver() {
		$this->mailer->send($this->view, $this->data, function($message) {
			$message->from('eventure420@mail.com');
			$message->to($this->to);
			$message->subject($this->subject);
		});
	}

	public function sendEmailConfirmation(User $user, $changeOfEmail = false) {
		$this->to = $user->email;
		if($changeOfEmail) {
			$this->view = 'emails.confirm';
		}
		else {
			$this->view = 'emails.welcome';
		}
		$this->subject = 'Welcome to Eventure - Please confirm your email.';
		$this->data = compact('user');

		$this->deliver();
	}

	public function sendContactMessage(Request $request) {
		$this->to = env('CONTACT_EMAIL');
		$this->view = 'emails.contact';
		$this->subject = 'Email from site contact form.';
		$this->data = compact('request');

		$this->deliver();
	}

	public function sendTicket(User $user, Event $event) {
		$this->to = $user->email;
		$this->view = 'emails.ticket-email';
		$this->subject = 'Your tickets.';
		$num_tickets = DB::table('attending')->where('event_id' , $event->id)->where('user_id', $user->id)->first()->num_tickets;
		$this->data = compact('user', 'event', 'num_tickets');

		$this->deliver();
	}

	public function sendEmailHasBeenConfirmed(User $user) {
		$this->to = $user->email;
		$this->view = 'emails.confirmed';
		$this->subject = 'Thank you for confirming your email';
		$this->data = compact('user');

		$this->deliver();
	}

	public function sendRecievedContactMessage(Request $request) {
		$this->to = $request->email;
		$this->view = 'emails.message-recieved';
		$this->subject = 'Thank you for the message.';
		$this->data = compact('request');

		$this->deliver();
	}
}

