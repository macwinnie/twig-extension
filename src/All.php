<?php

namespace macwinnie\TwigExtensions;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use HaydenPierce\ClassFinder\ClassFinder;

use macwinnie\TwigExtensions\Div\Functions as ExtensionFunctions;

require_once( __DIR__ . '/helper/include.php' );

/*
 * https://twig.symfony.com/doc/3.x/advanced.html#creating-an-extension
 */
class All extends AbstractExtension {

    private $classes = [];

    /**
     * Return extension name
     *
     * @return string
     */
    public function getName() {
        return 'macwinnie/twig-extensions';
    }

    /**
     * constructor function
     */
    public function __construct () {
        $this->classes = ClassFinder::getClassesInNamespace('macwinnie\TwigExtensions\Div', ClassFinder::RECURSIVE_MODE);
    }

    /**
     * function that adds new functions to Twig
     */
    public function getFunctions () {
        $fkts = [
            new TwigFunction( 'env', [ new ExtensionFunctions(), 'twigEnv' ] ),
        ];
        return $fkts;
    }

    /**
     * function that adds new filters to Twig
     */
    public function getFilters () {
        $fkts = [];
        return $fkts;
    }

    /**
     * function that adds new globals to Twig
     */
    public function getGlobals () {
        $fkts = [];
        return $fkts;
    }

    /**
     * function that adds new operators to Twig
     */
    public function getOperators () {
        $fkts = [];
        return $fkts;
    }

    /**
     * function that adds new tests to Twig
     */
    public function getTests () {
        $fkts = [];
        return $fkts;
    }
}
