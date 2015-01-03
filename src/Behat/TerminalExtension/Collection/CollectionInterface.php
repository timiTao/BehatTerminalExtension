<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Collection;

use Behat\TerminalExtension\Terminal\TerminalInterface;

/**
 * Class Collection
 *
 * @package Behat\TerminalExtension\Collection
 */
interface CollectionInterface
{
    /**
     * @param string $key
     * @return TerminalInterface
     */
    public function get($key);

    /**
     * @param string $key
     * @param TerminalInterface $terminal
     * @return void
     */
    public function set($key, TerminalInterface $terminal);
}
