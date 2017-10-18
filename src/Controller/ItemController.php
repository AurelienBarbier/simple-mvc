<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 */

namespace Controller;

use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ItemController extends AbstractController
{

    /**
     * @return string
     */
    public function index(){

        $foo = 'Les items';
        return $this->_twig->render('Item/index.html.twig', ['foo' => $foo]);

    }


    /**
     * @param $id
     * @return string
     */
    public function details($id){

        return $this->_twig->render('Item/details.html.twig', ['foo' => 'Item number ' . $id]);
    }

    public function add(){

        $formFactory = Forms::createFormFactory();

        $form = $formFactory->createBuilder()
            ->add('name', TextType::class)
            ->getForm();

        return $this->_twig->render('Item/add.html.twig', ['form' => $form]);

    }
}