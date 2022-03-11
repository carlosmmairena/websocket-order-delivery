<?php

namespace Delivery\Infrastructure\Bus;

use Delivery\Infrastructure\Bus\Contracts\CommandBus;
use Delivery\Application\Bus\Contracts\Container;
use Delivery\Application\Contracts\Command;

final class SimpleCommandBus implements CommandBus
{
    private const COMMAND_PREFIX = 'Command';
    private const HANDLER_PREFIX = 'Handler';

    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    public function execute($command)
    {
        return $this->resolveHandler($command)->__invoke($command);
    }

    public function resolveHandler(Command $command)
    {
        return $this->container->make($this->getHandlerClass($command));
    }

    public function getHandlerClass(Command $command) : string
    {
        return str_replace(
            self::COMMAND_PREFIX,
            self::HANDLER_PREFIX,
            get_class($command)
        );
    }

}
