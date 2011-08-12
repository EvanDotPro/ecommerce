<?php
use Zend\Config\Config,
    Zend\Di\Configuration,
    Zend\Di\Definition,
    Zend\Di\DependencyInjector;
class Bootstrap 
{
    protected $_config;
    protected $_di;

    public function __construct(Config $config)
    {
        $this->_config = $config;
    }

    public function execute()
    {
        $this->defineDependencies();
    }

    public function getContainer()
    {
        return $this->_di;
    }

    public function defineDependencies()
    {
        $definition = new Definition\AggregateDefinition;
        $this->_di = new DependencyInjector;
        $this->_di->setDefinition($definition);
        $config = new Configuration($this->_config->di);
        $config->configure($this->_di);
        $this->_di->getDefinition()->addDefinition(new Definition\RuntimeDefinition);
    }
}
