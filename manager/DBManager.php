<?php
namespace manager;

use \NotOrm;
use \PDO;

class DBManager {

	private static $pdo = null;
	private static $no = null;

	public static function &pdo() {
		if (static::$pdo === null) {
			$DB = unserialize(DB)['app_rw'];
			$pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$pdoOptions[PDO::MYSQL_ATTR_INIT_COMMAND ] = 'SET NAMES utf8mb4';
			$pdo = new PDO(
				"mysql:host={$DB['host']};dbname={$DB['name']}", $DB['login'], $DB['password'], $pdoOptions);
			static::$pdo = $pdo;
		}
		return static::$pdo;
	}

	public static function &no() {
		if (static::$no === null) {
			static::$no = new NotOrm(static::pdo());
		}
		return static::$no;
	}

	public static function free() {
		static::$pdo = null;
		static::$no = null;
	}
}