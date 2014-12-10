<?php

namespace Autodoprava\AppBundle\Model;
use \dibi;

/**
 * Model pro dotazy ohledně zákazníků
 * @author Marek Rojík
 */
class CustomerRepository
{
	/**
	 * Atribut pro připojení do databáze
	 */
	private $connection;

	/**
	 * Konstruktor pro vytvoření připojení k databázi
	 * @param [type] $connection [description]
	 */
	function __construct($connection)
	{
		$this->connection = $connection->dibi;
	}

	/**
	 * Metoda sloužící pro vložení nového zákazníka
	 * @param $customer nový zákazník
	 */
	public function addNewCustomer($customer)
	{
		// $orders = array('jmeno' => 'Mrr', 'prijmeni' => 'aseqw', 'ulice' => 'qweq', 'email' => 'asd@qwe.cz', 'mesto' => 'qwe', 'psc' => '45212', 'datum_registrace' => '2014-09-15');
		$customer['datum_registrace'] = new \DateTime();
		// $this->connection->query('INSERT INTO [zakaznici]', $customer);
		$this->connection->insert('zakaznici', $customer)
			->execute();
	}

	/**
	 * Metoda vracející zákazníka na základě emailu
	 * @param  $email email zákazníka
	 */
	public function fetchCustomerByEmail($email)
	{
		// return $this->connection->query('SELECT [id_zakaznika] FROM [zakaznici] WHERE [email] = %s', $email);
		return $this->connection->select('id_zakaznika')
			->from('zakaznici')
			->where('email = %s', $email)
			->fetchAll();
	}

	/**
	 * Metoda vracející poslední zákazníka, který byl založený
	 */
	public function fetchLastCustomer()
	{
		// return $this->connection->query('SELECT [id_zakaznika] FROM [zakaznici] ORDER BY [id_zakaznika] DESC')->fetchSingle();
		return $this->connection->select('id_zakaznika')
			->from('zakaznici')
			->orderBy('id_zakaznika', 'desc')
			->fetchSingle();
	}

	/**
	 * Metoda vracející zákazníka na základě ID
	 * @param  $id ID zákazníka
	 */
	public function fetchCustomerById($id)
	{
		return $this->connection->select('*')
			->from('zakaznici')
			->where('id_zakaznika = %i', $id)
			->fetchAll();
	}

	/**
	 * Metoda vracející počet objednávek určitého zákazníka
	 * @param  $id ID zákazníka
	 */
	public function fetchCountOrdersCustomer($id)
	{
		return $this->connection->select('count(*)')
			->from('objednavky')
			->where('zakaznici_id = %i', $id)
			->fetchSingle();
	}

	/**
	 * Metoda vracející počet objednávek zákazníka, které už byly vyřízeny
	 * @param  $id ID zákazníka
	 */
	public function fetchCountOrdersOK($id)
	{
		return $this->connection->select('count(*)')
			->from('objednavky')
			->where('zakaznici_id = %i', $id)
			->where('vyrizeno = %i', 1)
			->fetchSingle();
	}
}