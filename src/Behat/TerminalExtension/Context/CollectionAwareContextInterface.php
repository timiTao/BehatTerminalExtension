<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Context;

use Behat\TerminalExtension\Collection\CollectionInterface;

/**
 * Interface CollectionAwareContextInterface
 *
 * @package Behat\TerminalExtension\Context
 */
interface CollectionAwareContextInterface
{
    /**
     * @param CollectionInterface $collection
     * @return void
     */
    public function setTerminalCollection(CollectionInterface $collection);

    /**
     * @param string $alias
     * @return void
     */
    public function setTerminalDefaultAlias($alias);
}
