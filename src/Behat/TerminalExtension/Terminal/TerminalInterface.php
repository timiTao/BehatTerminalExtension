<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Terminal;

use Behat\TerminalExtension\Terminal\Response\TerminalResponseInterface;

/**
 * Interface TerminalInterface
 *
 * @package Behat\TerminalExtension\Terminal
 */
interface TerminalInterface
{
    /**
     * @param string $command
     * @return TerminalResponseInterface
     */
    public function exec($command);

    /**
     * Set working directory, from with command will be executed
     *
     * @param string $path
     * @return boolean
     */
    public function setWorkingDirectory($path);
}
