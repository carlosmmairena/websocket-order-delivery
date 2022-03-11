<?php

namespace Delivery\Application\Services\Article;

use Delivery\Application\Contracts\Command;

final class CreateOrderCommand implements Command
{
    
    private $client;
    private $type;
    private $isExpres;

    public function __construct(string $client, string $type, boolean $isExpres)
    {
        $this->client   = $client;
        $this->type     = $type;
        $this->isExpres = $isExpres;
    }

}
