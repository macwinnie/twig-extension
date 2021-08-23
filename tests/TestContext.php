<?php

namespace macwinnie\TestTwigExtensions;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use Behat\Behat\Tester\Exception\PendingException;

use macwinnie\TwigForm\Template;

/**
 * Defines application features from the specific context.
 */
class TestContext implements Context {

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct() {
    }
}
