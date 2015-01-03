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
class Collection extends \ArrayObject implements CollectionInterface
{
    /**
     * @param string $key
     * @return TerminalInterface
     */
    public function get($key)
    {
        return $this->offsetGet($key);
    }

    /**
     * @param string $key
     * @param TerminalInterface $terminal
     */
    public function set($key, TerminalInterface $terminal)
    {
        $this->offsetSet($key, $terminal);
    }
}
