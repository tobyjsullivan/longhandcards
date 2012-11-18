<?php
require_once('mysql_config.php');

class Database extends Mysqli {
	public function __construct() {
		parent::__construct(MysqlConfig::HOSTNAME, MysqlConfig::USERNAME, MysqlConfig::PASSWORD, MysqlConfig::DATABASE);
	}
}
?>