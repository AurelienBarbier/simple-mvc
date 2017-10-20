<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 18/10/17
 * Time: 17:52
 */

namespace Core;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Extension_Debug;
// Form
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Form\TwigRenderer;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;

//Trans
use Symfony\Component\Translation\Translator;
use Symfony\Bridge\Twig\Extension\TranslationExtension;



class TwigSetup
{
    /**
     * @var Twig_Environment
     */
    private $_twig;


    /**
     * TwigSetup constructor.
     */
    public function __construct() : Twig_Environment
    {

        $defaultFormTheme = 'form_div_layout.html.twig';

        $vendorDir = realpath(__DIR__.'/../vendor');
        // the path to TwigBridge library so Twig can locate the
        // form_div_layout.html.twig file
        $appVariableReflection = new \ReflectionClass('\Symfony\Bridge\Twig\AppVariable');
        $vendorTwigBridgeDir = dirname($appVariableReflection->getFileName());
        // the path to your other templates
        $twigFormTemplate = $vendorTwigBridgeDir.'/Resources/views/Form';

        // create the Translator
        $translator = new Translator('en');

        $loader = new Twig_Loader_Filesystem([APP_VIEW_PATH, $twigFormTemplate]);
        $this->_twig = new Twig_Environment($loader, ['cache' => false, 'debug' => true]);
        $this->_twig->addExtension(new FormExtension());
        $this->_twig->addExtension(new Twig_Extension_Debug());
        $this->_twig->addExtension(new TranslationExtension($translator));

        $formEngine = new TwigRendererEngine(array($defaultFormTheme), $this->_twig);

        $csrfManager = null;
        $this->_twig->addRuntimeLoader(new \Twig_FactoryRuntimeLoader(array(
            TwigRenderer::class => function () use ($formEngine, $csrfManager) {
                return new TwigRenderer($formEngine, $csrfManager);
            },
        )));

        return $this->_twig;
    }
}