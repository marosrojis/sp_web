<?php

namespace Autodoprava\AppBundle\Model;
use \dibi;

/**
 * Model pro různé dotazy
 * @author Marek Rojík
 */
class OtherRepository
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
	 * Metoda vracející obsah určité stránky
	 * @param  $id ID stránky
	 */
	function fetchTextPage($id)
	{
		return $this->connection->select('obsah')
			->from('stranky')
			->where('id_stranky = %i', $id)
			->fetchSingle();
	}

	/**
	 * Metoda vracející informace o firmě
	 */
	function fetchContactCompany()
	{
		return $this->connection->select('*')
			->from('firma')
			->fetchAll();
	}

	/**
	 * Metoda sloužící k editaci informací o firmě
	 * @param  $data data
	 */
	public function editContact($data)
	{
		$this->connection->update('firma', $data)
			->execute();
	}

	/**
	 * Metoda sloužící k editaci obsahu stránek
	 * @param  $id   ID stránky
	 * @param  $data data
	 */
	public function editContent($id, $data)
	{
		$this->connection->update('stranky', $data)
			->where('id_stranky = %i', $id)
			->execute();
	}
}