<?php
/**
 * @author Tomasz Kunicki
 */
namespace Behat\TerminalExtension\ServiceContainer;

use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Behat\Testwork\ServiceContainer\ServiceProcessor;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class Extension
 *
 * @package Behat\TerminalExtension\ServiceContainer
 */
class Extension implements ExtensionInterface
{
    /**
     * Name
     */
    const EXTENSION_NAME = 'terminal_extension';

    /**
     *
     */
    const TERMINAL_COLLECTION_FACTORY_ID = 'terminal_extension.terminal.collection.factory';

    /**
     * Hook for others factories
     */
    const TERMINAL_FACTORY_TAG = 'terminal_extension.terminal_factory_tag';


    /**
     * @var ServiceProcessor
     */
    private $processor;

    /**
     * Initializes compiler pass.
     *
     * @param null|ServiceProcessor $processor
     */
    public function __construct(ServiceProcessor $processor = null)
    {
        $this->processor = $processor ? : new ServiceProcessor();
    }

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        $this->processTerminalFactoryRegistration($container);
    }

    /**
     * {@inheritDoc}
     */
    public function getConfigKey()
    {
        return Extension::EXTENSION_NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(ExtensionManager $extensionManager)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function configure(ArrayNodeDefinition $builder)
    {
        $builder
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode(Extension::EXTENSION_NAME)
                ->children()
                    ->scalarNode('default_alias_terminal')->defaultValue('default')->end()
                    ->arrayNode('terminals')
                    ->isRequired()
                    ->requiresAtLeastOneElement()
                    ->prototype('array')
                        ->children()
                            ->scalarNode('type')->end()
                            ->scalarNode('working_directory')->end()
                            ->arrayNode('options')
                                ->prototype('variable')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * @param ContainerBuilder $container
     * @param array $config
     */
    public function load(ContainerBuilder $container, array $config)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Config'));
        $loader->load('services.yml');

        $container->setParameter(Extension::EXTENSION_NAME . '.config', $config);
        $container->setParameter(Extension::EXTENSION_NAME . '.terminals', $config[Extension::EXTENSION_NAME]['terminals']);
        $container->setParameter(
            Extension::EXTENSION_NAME . '.config.default_terminal_alias',
            $config[Extension::EXTENSION_NAME]['default_alias_terminal']
        );
    }

    /**
     * Processes all search engines in the container.
     *
     * @param ContainerBuilder $container
     */
    private function processTerminalFactoryRegistration(ContainerBuilder $container)
    {
        $references = $this->processor->findAndSortTaggedServices($container, self::TERMINAL_FACTORY_TAG);
        $definition = $container->getDefinition(Extension::TERMINAL_COLLECTION_FACTORY_ID);

        foreach ($references as $reference) {
            $definition->addMethodCall('registerTerminalFactory', array($reference));
        }
    }
}
