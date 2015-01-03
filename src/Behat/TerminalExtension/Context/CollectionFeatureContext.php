<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\TerminalExtension\Collection\CollectionInterface;

/**
 * Class CollectionFeatureContext
 *
 * @package Behat\TerminalExtension\Context
 */
class CollectionFeatureContext implements Context, SnippetAcceptingContext, CollectionAwareContextInterface
{
    /**
     * @var string
     */
    protected $currentTerminalAlias;

    /**
     * @var CollectionInterface
     */
    protected $collection;

    /**
     * @param CollectionInterface $collection
     * @return void
     */
    public function setTerminalCollection(CollectionInterface $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param string $alias
     * @return void
     */
    public function setTerminalDefaultAlias($alias)
    {
        $this->currentTerminalAlias = $alias;
    }

    /**
     * @return string
     */
    public function getCurrentTerminalAlias()
    {
        return $this->currentTerminalAlias;
    }

    /**
     * @return \Behat\TerminalExtension\Terminal\TerminalInterface
     */
    protected function getCurrentTerminal()
    {
        return $this->collection->get($this->getCurrentTerminalAlias());
    }

    /**
     * @Given Terminal execute command :arg1
     */
    public function executeCommand($arg1)
    {
        echo $this->getCurrentTerminal()->exec($arg1);
    }

    /**
     * @Given Terminal change working directory to :arg1
     */
    public function changeWorkingDirectory($path)
    {
        echo $this->getCurrentTerminal()->setWorkingDirectory($path);
    }
}
