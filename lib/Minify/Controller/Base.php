<?php

use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * Base class for Minify controller
 *
 * The controller class validates a request and uses it to create a configuration for Minify::serve().
 */
abstract class Minify_Controller_Base implements Minify_ControllerInterface
{
    /**
     * @var Minify_Env
     */
    protected $env;

    /**
     * @var Minify_Source_Factory
     */
    protected $sourceFactory;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param Minify_Env            $env
     * @param Minify_Source_Factory $sourceFactory
     * @param LoggerInterface       $logger
     */
    public function __construct(Minify_Env $env, Minify_Source_Factory $sourceFactory, LoggerInterface $logger = null)
    {
        $this->env = $env;
        $this->sourceFactory = $sourceFactory;
        if (!$logger) {
            $logger = new Logger('minify');
        }
        $this->logger = $logger;
    }

    /**
     * Create controller sources and options for Minify::serve()
     *
     * @param array $options controller and Minify options
     *
     * @return Minify_ServeConfiguration
     */
    abstract public function createConfiguration(array $options);

    /**
     * {@inheritdoc}
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * Send message to the Minify logger
     *
     * @param string $msg
     *
     * @return void
     *
     * @deprecated use $this->logger
     */
    public function log($msg)
    {
        \trigger_error(__METHOD__ . ' is deprecated in Minify 3.0.', \E_USER_DEPRECATED);
        $this->logger->info($msg);
    }
}
