<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\Collection;

use Behat\TerminalExtension\Exception\Exception;
use Behat\TerminalExtension\Terminal\TerminalFactoryInterface;

/**
 * Class Factory
 *
 * @package Behat\TerminalExtension\Collection
 */
class Factory
{
    /**
     * @var array
     */
    protected $terminalsConfiguration;

    /**
     * @var TerminalFactoryInterface[]
     */
    protected $registeredFactories;

    /**
     * @param $terminalsConfiguration
     */
    function __construct($terminalsConfiguration)
    {
        $this->terminalsConfiguration = $terminalsConfiguration;
    }

    /**
     * @param TerminalFactoryInterface $factoryInterface
     */
    public function registerTerminalFactory(TerminalFactoryInterface $factoryInterface)
    {
        $this->registeredFactories[$factoryInterface->getSystemName()] = $factoryInterface;
    }

    /**
     * @return CollectionInterface
     */
    public function createCollection()
    {
        $collection = new Collection();

        foreach ($this->terminalsConfiguration as $alias => $terminalConfiguration) {
            $type = $terminalConfiguration['type'];
            $options = $terminalConfiguration['options'];
            $workingDirectory = isset($terminalConfiguration['working_directory']) ? $terminalConfiguration['working_directory'] : '';

            $factory = $this->findSupportingFactory($type);

            $terminal = $factory->factory($options);
            $terminal->setWorkingDirectory($workingDirectory);
            $collection->set($alias, $terminal);
        }

        return $collection;
    }

    /**
     * @param $type
     * @return TerminalFactoryInterface
     * @throws \Behat\TerminalExtension\Exception\Exception
     */
    public function findSupportingFactory($type)
    {
        /** @var TerminalFactoryInterface $factory */
        foreach ($this->registeredFactories as $factory) {
            if ($type == $factory->getSystemName()) {
                return $factory;
            }
        }

        throw new Exception(sprintf("Not found factory for type '%s'. Check registration or system name", $type));
    }
}
