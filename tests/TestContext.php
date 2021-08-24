<?php

namespace macwinnie\TestTwigExtensions;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use Behat\Behat\Tester\Exception\PendingException;

use Twig\Environment;
use Twig\Loader\ArrayLoader;

use macwinnie\TwigExtensions\All as Extensions;

require_once( __DIR__ . '/../src/helper/include.php' );

/**
 * Defines application features from the specific context.
 */
class TestContext implements Context {

    private $helper = null;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct() {
    }

    /**
     * @Given the environmental variable :var with value :val
     */
    public function theEnvironmentalVariableWithValue( $var, $val ) {
        $_ENV[ $var ] = $val;
        Assert::assertEquals( $val, \env( $var ) );
    }

    /**
     * @Given the template
     */
    public function theTemplate( PyStringNode $string ) {
        $this->helper = $string;
    }

    /**
     * @Then the template is rendered as
     */
    public function theTemplateIsRenderedAs( PyStringNode $rendered ) {
        $loader = new ArrayLoader( [
            'template' => $this->helper,
        ] );
        $twig = new Environment( $loader );
        $twig->addExtension(
            new Extensions()
        );
        $realRendered = $twig->load('template')->render();
        Assert::assertEquals( $rendered->getRaw(), $realRendered );
        $this->helper = null;
    }
}
