<?php
class Email {
	private $to;
	private $from;
	private $subject;
	private $body;

	public function __construct() {
		$this->from = "no-reply@longhandcards.com";
	}

	public function setTo($to) {
		$this->to = $to;
	}

	public function setFrom($from) {
		$this->from = $from;
	}

	public function setSubject($subject) {
		$this->subject = $subject;
	}

	public function setBody($body) {
		$this->body = $body;
	}

	public function send() {
		// TODO
	}
}
?>