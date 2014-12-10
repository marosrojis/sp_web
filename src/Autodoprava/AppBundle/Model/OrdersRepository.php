<?php

namespace Autodoprava\AppBundle\Model;
use \dibi;

/**
 * Model pro dotazy pro objednávky
 * @author Marek Rojík
 */
class OrdersRepository
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
	 * Metoda sloužící pro přidání objednávky
	 */
	public function addNewOrder($order)
	{
		$this->connection->insert('objednavky', $order)
			->execute();
	}

	/**
	 * Metoda vracející všechny objednávky v závislosti na zákazníkovi a autě
	 */
	public function fetchOrders()
	{
		return $this->connection->select('*')
			->from('objednavky')
			->innerJoin('zakaznici')->on('zakaznici_id = id_zakaznika')
			->innerJoin('auto')->on('auto_id = id_auta')
			->orderBy('vyrizeno, datum')
			->fetchAll();
	}

	/**
	 * Metoda vracející stav objednávky
	 * @param  $id ID objednávky
	 */
	public function fetchStatus($id)
	{
		return $this->connection->select('vyrizeno')
			->from('objednavky')
			->where('id_objednavky = %i', $id)
			->fetchSingle();
	}

	/**
	 * Metoda sloužící pro změnu stavu objednávky
	 * @param  $id     ID objednávky
	 * @param  $status stav objednávky
	 */
	public function editDone($id, $status)
	{
		$order = array('vyrizeno' => $status);
		$this->connection->update('objednavky', $order)
			->where('id_objednavky = %i', $id)
			->execute();
	}
}