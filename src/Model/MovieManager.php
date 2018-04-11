<?php
/**
* Created by PhpStorm.
* User: sylvain
* Date: 07/03/18
* Time: 18:20
* PHP version 7
*/

namespace Model;

/**
*
*/
class MovieManager extends AbstractManager
{
  const TABLE = 'movie';

  /**
  *  Initializes this class.
  */
  public function __construct()
  {
    parent::__construct(self::TABLE);
  }

  /**
  * Get one row from database by ID.
  *
  * @param  int $id
  *
  * @return array
  */
  public function selectOneById(int $id)
  {
    // prepared request
    $statement = $this->pdoConnection->prepare("SELECT  $this->table.*, director.name AS director FROM $this->table JOIN director ON $this->table.id_director = director.id WHERE $this->table.id=:id");
    $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
    $statement->bindValue('id', $id, \PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetch();
  }



  /**
  * INSERT one row in dataase
  *
  * @param Array $data
  */
  public function insert(array $data)
  {
    var_dump($data);

      // prepared request
      $statement = $this->pdoConnection->prepare("INSERT INTO  $this->table (`title`, `year`, `id_director`) VALUES (:title, :year, :id_director)");
      $statement->bindValue('title', $data['title'], \PDO::PARAM_STR);
      $statement->bindValue('year', $data['year'], \PDO::PARAM_INT);
      $statement->bindValue('id_director', $data['id_director'], \PDO::PARAM_INT);

      return $statement->execute();

  }



}
