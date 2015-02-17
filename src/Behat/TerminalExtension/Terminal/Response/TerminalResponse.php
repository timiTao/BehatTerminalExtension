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
class TerminalResponse implements TerminalResponseInterface
{

    /**
     * @var string
     */
    protected $responseString;

    /**
     * @param string $responseString
     */
    function __construct($responseString)
    {
        $this->responseString = $responseString;
    }

    /**
     * @return string
     */
    public function getResponseString()
    {
        return $this->responseString;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getResponseString();
    }
}
