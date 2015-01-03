<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Terminals\Local;

use Behat\TerminalExtension\Terminal\TerminalFactoryInterface;
use Behat\TerminalExtension\Terminal\TerminalInterface;

/**
 * Class Factory
 *
 * @package Behat\TerminalExtension\Terminals\Local
 */
class TerminalFactory implements TerminalFactoryInterface
{
    /**
     *
     */
    const NAME = 'local';

    /**
     * @return string
     */
    public function getSystemName()
    {
        return TerminalFactory::NAME;
    }

    /**
     * @param array $options
     * @return TerminalInterface
     */
    public function factory($options)
    {
        return new LocalTerminal();
    }
}
