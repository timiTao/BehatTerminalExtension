<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Context\Initializer;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer;
use Behat\TerminalExtension\Collection\CollectionInterface;
use Behat\TerminalExtension\Context\CollectionAwareContextInterface;

/**
 * Class CollectionAwareInitializer
 *
 * @package Behat\TerminalExtension\Context\Initializer
 */
class CollectionAwareInitializer implements ContextInitializer
{

    /**
     * @var string
     */
    protected $defaultAlias;

    /**
     * @var CollectionInterface
     */
    protected $collection;

    /**
     * @param $defaultAlias
     * @param CollectionInterface $collection
     */
    function __construct($defaultAlias, CollectionInterface $collection)
    {
        $this->defaultAlias = $defaultAlias;
        $this->collection = $collection;
    }

    /**
     * Initializes provided context.
     *
     * @param Context $context
     */
    public function initializeContext(Context $context)
    {
        if (!$context instanceof CollectionAwareContextInterface) {
            return;
        }
        $context->setTerminalCollection($this->collection);
        $context->setTerminalDefaultAlias($this->defaultAlias);
    }
}
