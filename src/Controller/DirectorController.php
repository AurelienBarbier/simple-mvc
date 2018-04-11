<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\DirectorManager;

/**
 * Class DirectorController
 *
 */
class DirectorController extends AbstractController
{

    /**
     * Display director listing
     *
     * @return string
     */
    public function index()
    {
        $directorManager = new DirectorManager();
        $directors = $directorManager->selectAll();

        return $this->twig->render('Director/index.html.twig', ['directors' => $directors]);
    }

    /**
     * Display director informations specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function show(int $id)
    {
        $directorManager = new DirectorManager();
        $director = $directorManager->selectOneById($id);

        return $this->twig->render('Director/show.html.twig', ['director' => $director]);
    }

    /**
     * Display director edition page specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function edit(int $id)
    {
        // TODO : edit director with id $id
        return $this->twig->render('Director/edit.html.twig', ['director', $id]);
    }

    /**
     * Display director creation page
     *
     * @return string
     */
    public function add()
    {
        // TODO : add a new director
        return $this->twig->render('Director/add.html.twig');
    }

    /**
     * Display director delete page
     *
     * @param  int $id
     *
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the director with id $id
        return $this->twig->render('Director/index.html.twig');
    }
}
