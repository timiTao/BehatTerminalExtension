<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Terminal;

/**
 * Interface TerminalFactoryInterface
 *
 * @package Behat\TerminalExtension\Terminal
 */
interface TerminalFactoryInterface
{
    /**
     * @return string
     */
    public function getSystemName();

    /**
     * @param array $options
     * @return TerminalInterface
     */
    public function factory($options);

}
