<?php
/**
* Created by PhpStorm.
* User: wcs
* Date: 23/10/17
* Time: 10:57
* PHP version 7
*/

namespace Model;

/**
* Class Movie
*
*/
class Movie
{
  private $id;

  private $title;

  private $year;

  private $director;

  /**
  * @return int
  */
  public function getId(): int
  {
    return $this->id;
  }

  /**
  * @param mixed $id
  *
  * @return Movie
  */
  public function setId($id): Movie
  {
    $this->id = $id;

    return $this;
  }

  /**
  * @return mixed
  */
  public function getTitle(): string
  {
    return $this->title;
  }

  /**
  * @param mixed $title
  *
  * @return Movie
  */
  public function setTitle($title):Movie
  {
    $this->title = $title;

    return $this;
  }
  /**
  * @return mixed
  */
  public function getYear(): int
  {
    return $this->year;
  }

  /**
  * @param int $year
  *
  * @return Movie
  */
  public function setYear(int $year):Movie
  {
    $this->year = $year;

    return $this;
  }
  /**
  * @return mixed
  */
  public function getDirector(): string
  {
    return $this->director;
  }

  /**
  * @param int $year
  *
  * @return Movie
  */
  public function setDirector(string $director):Movie
  {
    $this->director = $director;

    return $this;
  }
}
