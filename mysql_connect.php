<?php
require_once('mysql_config.php');

$db = new mysqli($MYSQL_HOSTNAME, $MYSQL_USERNAME, $MYSQL_PASSWORD, $MYSQL_DATABASE);

if ($db->connect_errno) {
    die("Failed to connect to database: (" . $db->connect_errno . ") " . $db->connect_error);
}
?>