<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Terminal\Response;


/**
 * Class TerminalResponse
 *
 * @package Behat\TerminalExtension\Terminal\Response
 */
interface TerminalResponseInterface
{
    /**
     * @return string
     */
    public function getResponseString();
}
