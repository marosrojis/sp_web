<?php

namespace Autodoprava\AppBundle\Model;
use \dibi;

/**
 * Model pro dotazy ohledně fotech
 * @author Marek Rojík
 */
class FotoRepository
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
	 * Metoda vracející fotky určitého auta
	 * @param  $idCar ID auta
	 */
	public function fetchFotoCars($idCar)
	{
		return $this->connection->select('*')
			->from('foto')
			->where('auto_id = %i', $idCar)
			->fetchAll();
	}

	/**
	 * Metoda pro vymazání fotky
	 * @param  $id ID fotky
	 */
	public function deleteFoto($id)
	{
		$this->connection->delete('foto')
			->where('id_foto = %i', $id)
			->execute();
	}

	/**
	 * Metoda vracející určitou fotku
	 * @param  $id ID fotky
	 */
	public function fetchFotoById($id)
	{
		return $this->connection->select('auto_id')
			->from('foto')
			->where('id_foto = %i', $id)
			->fetchSingle();
	}

	/**
	 * Metoda vracející počet fotek
	 */
	public function fetchCountFoto()
	{
		return $this->connection->select('COUNT(*) + 1')
			->from('foto')
			->fetchSingle();
	}

	/**
	 * Metoda pro přidání nové fotky
	 * @param $foto nové foto
	 */
	public function addNewFoto($foto)
	{
		$this->connection->insert('foto', $foto)
			->execute();
	}

	/**
	 * Metoda vracející určité fotky
	 * @param  $id ID fotky
	 */
	public function fetchFotoId($id)
	{
		return $this->connection->select('soubor')
			->from('foto')
			->where('id_foto = %i', $id)
			->fetchSingle();
	}
}