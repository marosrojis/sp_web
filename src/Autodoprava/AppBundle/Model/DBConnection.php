<?php

namespace Autodoprava\AppBundle\Model;
use \dibi;

/**
 * Třída vytvářející spojení s databází
 * @author Marek Rojík
 */
class DBConnection
{
	/**
	 * Atribuz pro připojení k DB
	 * @var [type]
	 */
	public $dibi;

	/**
	 * Konstruktor pro vytvoření spojení s DB
	 * @param $driver   mysql
	 * @param $host     IP databáze
	 * @param $user     jméno uživatele
	 * @param $password heslo
	 * @param $dbname   název databáze
	 */
	function __construct($driver, $host, $user, $password, $dbname)
	{
		$this->dibi = dibi::connect(array(
	    'driver'   => $driver,
	    'host'     => $host,
	    'username' => $user,
	    'password' => $password,
	    'database' => $dbname,
	    'charset'  => 'utf8',
		));
	}
}