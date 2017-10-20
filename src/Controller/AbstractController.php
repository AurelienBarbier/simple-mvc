<?php

namespace Controller;

//Twig
use Core\TwigSetup;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 */
class AbstractController
{
    /**
     * @var TwigSetup
     */
    protected $_twig;

    public function __construct()
    {
        $this->_twig = new TwigSetup();
    }
}