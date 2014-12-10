<?php

namespace Autodoprava\AppBundle\Model;
use \dibi;

/**
 * Model pro dotazy ohledně aut
 * @author Marek Rojík
 */
class CarsRepository
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
	 * Metoda vracející všechny auta
	 */
	public function fetchAllCars()
	{
		// return $this->connection->query('SELECT * FROM [auto], [preprava] WHERE [auto.preprava_id] = [preprava.id_prepravy]');
		return $this->connection->select('*')
			->from('auto')
			->innerJoin('preprava')->on('preprava_id = id_prepravy')
			->orderBy('vyrazeno, preprava_id, nazev')
			->fetchAll();
	}

	/**
	 * Metoda vracející všechny auta, které se nacházejí v určité přepravě
	 * @param  $transport ID přepravy
	 */
	public function fetchAllCarsByTransport($transport)
	{
		// return $this->connection->query('SELECT * FROM [auto], [preprava] WHERE [auto.preprava_id] = [preprava.id_prepravy] AND [preprava.id_prepravy] = %i', $transport);
		return $this->connection->select('*')
			->from('auto')
			->innerJoin('preprava')->on('auto.preprava_id = preprava.id_prepravy')
			->where('preprava_id = %i', $transport)
			->where('vyrazeno = %i', 0)
			->fetchAll();
	}

	/**
	 * Metoda vracející fotky aut, které se nacházejí v určité přepravě
	 * @param  $transport ID přepravy
	 */
	public function fetchCarsFotoByTransport($transport)
	{
		// return $this->connection->query('SELECT * FROM auto, foto WHERE auto.id_auta = foto.auto_id AND auto.preprava_id = %i', $transport);
		return $this->connection->select('*')
			->from('auto')
			->where('preprava_id = %i', $transport)
			->innerJoin('foto')->on('auto.id_auta = foto.auto_id')
			->where('vyrazeno = %i', 0)
			->fetchAll();
	}

	/**
	 * Metoda vracející určitou přepravu
	 * @param  $id ID přepravy
	 */
	public function fetchTransportById($id)
	{
		// return $this->connection->query('SELECT [nazev] FROM [preprava] WHERE [id_prepravy] = %i', $id)->fetchSingle();
		return $this->connection->select('nazev_prepravy')
			->from('preprava')
			->where('id_prepravy = %i', $id)
			->fetchSingle();
	}

	/**
	 * Metoda vracející určité auto
	 * @param  $id ID auto
	 */
	public function fetchCarById($id)
	{
		return $this->connection->select('*')
			->from('auto')
			->where('id_auta = %i', $id)
			->fetchAll();
	}

	/**
	 * Metoda vracející název určitého auta
	 * @param  $id ID auta
	 */
	public function fetchCarNameById($id)
	{
		// return $this->connection->query('SELECT [nazev] FROM [auto] WHERE [id_auta] = %i', $id)->fetchSingle();
		return $this->connection->select('nazev')
			->from('auto')
			->where('id_auta = %i', $id)
			->fetchSingle();
	}

	/**
	 * Metoda vracející informaci o autě, zda je vyřazeno
	 * @param  $id ID auta
	 */
	public function fetchStatus($id)
	{
		return $this->connection->select('vyrazeno')
			->from('auto')
			->where('id_auta = %i', $id)
			->fetchSingle();
	}

	/**
	 * Metoda sloužící pro vyřazení auta
	 * @param  $id     ID auta
	 * @param  $status stav auta
	 */
	public function editStatus($id, $status)
	{
		$update = array('vyrazeno' => $status);
		$this->connection->update('auto', $update)
			->where('id_auta = %i', $id)
			->execute();
	}

	/**
	 * Metoda sloužící k vytvoření nového auta
	 * @param $car informace o autě
	 */
	public function addNewCar($car)
	{
		$car['vyrazeno'] = 0;
		$this->connection->insert('auto', $car)
			->execute();
	}

	/**
	 * Metoda sloužící pro editaci informací o autě
	 * @param  $id  ID auta
	 * @param  $car informace o autě
	 */
	public function editCar($id, $car)
	{
		$this->connection->update('auto', $car)
			->where('id_auta = %i', $id)
			->execute();
	}

	/**
	 * Metoda sloužící pro nalezení poslední ID auta, které bylo vloženo do databáze
	 */
	public function findLastIdCar()
	{
		return $this->connection->select('id_auta')
			->from('auto')
			->orderBy('id_auta', 'desc')
			->fetchSingle();	
	}
}