<?php

namespace macwinnie\TwigExtensions;

use HaydenPierce\ClassFinder\ClassFinder;

/*
 * https://twig.symfony.com/doc/3.x/advanced.html#creating-an-extension
 */
class All extends \Twig\Extension\AbstractExtension {

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
        $fkts = [];
        foreach ( $this->classes as $c ) {
            $hlpr = new $c;
            $fkts = array_merge( $fkts, $hlpr->getFunctions() );
        }
        return $fkts;
    }

    /**
     * function that adds new filters to Twig
     */
    public function getFilters () {
        $fkts = [];
        foreach ( $this->classes as $c ) {
            $hlpr = new $c;
            $fkts = array_merge( $fkts, $hlpr->getFilters() );
        }
        return $fkts;
    }

    /**
     * function that adds new globals to Twig
     */
    public function getGlobals () {
        $fkts = [];
        foreach ( $this->classes as $c ) {
            $hlpr = new $c;
            $fkts = array_merge( $fkts, $hlpr->getGlobals() );
        }
        return $fkts;
    }

    /**
     * function that adds new operators to Twig
     */
    public function getOperators () {
        $fkts = [];
        foreach ( $this->classes as $c ) {
            $hlpr = new $c;
            $fkts = array_merge( $fkts, $hlpr->getOperators() );
        }
        return $fkts;
    }

    /**
     * function that adds new tests to Twig
     */
    public function getTests () {
        $fkts = [];
        foreach ( $this->classes as $c ) {
            $hlpr = new $c;
            $fkts = array_merge( $fkts, $hlpr->getTests() );
        }
        return $fkts;
    }
}
