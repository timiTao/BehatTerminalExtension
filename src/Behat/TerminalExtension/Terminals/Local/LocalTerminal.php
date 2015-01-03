<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Terminals\Local;

use Behat\TerminalExtension\Terminal\Response\TerminalResponse;
use Behat\TerminalExtension\Terminal\TerminalInterface;

/**
 * Class LocalTerminal
 *
 * @package Behat\TerminalExtension\Terminals
 */
class LocalTerminal implements TerminalInterface
{
    /**
     * @var string
     */
    private $workingDirectory;

    /**
     * @param string $command
     * @return string
     */
    public function exec($command)
    {
        $output = shell_exec(sprintf("cd %s && %s", $this->getWorkingDirectory(), $command));

        return new TerminalResponse($output);
    }

    /**
     * Set working directory, from with command will be executed
     *
     * @param string $path
     * @return boolean
     */
    public function setWorkingDirectory($path)
    {
        $this->workingDirectory = $path;
    }

    /**
     * @return string
     */
    protected function getWorkingDirectory()
    {
        return $this->workingDirectory;
    }


}
