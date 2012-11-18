<?php
require_once('Database.php');

class Order {
	private $message;
	private $writer;
	private $sender_name;
	private $sender_email;
	private $recipient_name;
	private $recipient_address;
	private $recipient_address2;
	private $recipient_city;
	private $stripe_payment;
	private $id = null;
	private $db = null;

	public function __construct() {
		$this->db = new Database();
	}

	public function setStripePayment($stripe_payment) {
		$this->ensureUpdatable();
		
		$this->stripe_payment = $this->db->escape_string($stripe_payment);
	}

	public function setMessage($message) {
		$this->ensureUpdatable();
		
		// TODO Check length

		$this->message = $this->db->escape_string($message);
	}

	public function setWriter($writer) {
		$this->ensureUpdatable();
		
		// TODO Confirm writer is valid

		$this->writer = $this->db->escape_string($writer);
	}

	public function setSenderName($sender_name) {
		$this->ensureUpdatable();
		
		$this->sender_name = $this->db->escape_string($sender_name);
	}

	public function setSenderEmail($sender_email) {
		$this->ensureUpdatable();
		
		// TODO validate format

		$this->sender_email = $this->db->escape_string($sender_email);
	}

	public function setRecipientName($recipient_name) {
		$this->ensureUpdatable();
		
		$this->recipient_name = $this->db->escape_string($recipient_name);
	}

	public function setRecipientAddress($recipient_address) {
		$this->ensureUpdatable();
		
		$this->recipient_address = $this->db->escape_string($recipient_address);
	}

	public function setRecipientAddress2($recipient_address2) {
		$this->ensureUpdatable();
		
		$this->recipient_address2 = $this->db->escape_string($recipient_address2);
	}

	public function setRecipientCity($recipient_city) {
		$this->ensureUpdatable();
		
		$this->recipient_city = $this->db->escape_string($recipient_city);
	}

	public function setRecipientPostal($recipient_postal) {
		$this->ensureUpdatable();
		
		$this->recipient_postal = $this->db->escape_string($recipient_postal);
	}

	public function setRecipientProvince($recipient_province) {
		$this->ensureUpdatable();
		
		$this->recipient_province = $this->db->escape_string($recipient_province);
	}

	public function setRecipientCountry($recipient_country) {
		$this->ensureUpdatable();
		
		$this->recipient_country = $this->db->escape_string($recipient_country);
	}

	public function save() {
		$this->ensureUpdatable();

		$sql = "INSERT INTO `orders` (
				`id`, 
				`processed`, 
				`stripe_payment`,
				`sender_name`,
				`sender_email`,
				`message`,
				`writer`,
				`recipient_name`,
				`recipient_address`,
				`recipient_address2`,
				`recipient_city`,
				`recipient_postal`,
				`recipient_province`,
				`recipient_country`
			) VALUES (
				'',
				NOW(),
				'{$this->stripe_payment}',
				'{$this->sender_name}',
				'{$this->sender_email}',
				'{$this->message}',
				'{$this->writer}',
				'{$this->recipient_name}',
				'{$this->recipient_address}',
				'{$this->recipient_address2}',
				'{$this->recipient_city}',
				'{$this->recipient_postal}',
				'{$this->recipient_province}',
				'{$this->recipient_country}'
			)";

		if(!$this->db->query($sql)) {
			die("Error saving order: ".$this->db->error);
		}

		$this->id = $this->db->insert_id;

		$this->db->close();
		$this->db = null;
	}

	private function ensureUpdatable() {
		if($this->id != null || $this->db == null) {
			throw new Exception("Order already saved. Modification disallowed.");
		}
	}

	public function getOrderId() {
		return $this->id;
	}
}
?>