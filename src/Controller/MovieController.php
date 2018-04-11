<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\MovieManager;

/**
 * Class MovieController
 *
 */
class MovieController extends AbstractController
{

    /**
     * Display movie listing
     *
     * @return string
     */
    public function index()
    {
        $movieManager = new MovieManager();
        $movies = $movieManager->selectAll();

        return $this->twig->render('Movie/index.html.twig', ['movies' => $movies]);
    }

    /**
     * Display movie informations specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function show(int $id)
    {
        $movieManager = new MovieManager();
        $movie = $movieManager->selectOneById($id);

        return $this->twig->render('Movie/show.html.twig', ['movie' => $movie]);
    }

    /**
     * Display movie edition page specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function edit(int $id)
    {
        // TODO : edit movie with id $id
        return $this->twig->render('Movie/edit.html.twig', ['movie', $id]);
    }

    /**
     * Display movie creation page
     *
     * @return string
     */
    public function add()
    {
      $errors = [];
      if(!empty($_POST)){
        if($this->cleanData($_POST)){

          $movieManager = new MovieManager();
          if($movieManager->insert()){
            header('Location:/movies');
          }
        }
      }
        // TODO : add a new movie
        return $this->twig->render('Movie/add.html.twig', ['errors' => $errors]);
    }

    /**
     * Display movie delete page
     *
     * @param  int $id
     *
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the movie with id $id
        return $this->twig->render('Movie/index.html.twig');
    }

    public function cleanData($data){

      // TODO CLean all my data from user;
      return $data;
    }
}
