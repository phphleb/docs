<?php
// File /app/Bootstrap/Events/KernelEvent.php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use Hleb\Base\Event;
use Hleb\Reference\Interface\Log;
use Hleb\Reference\Interface\Request;

class KernelEvent extends Event
{
    #[\Override]
    public function __construct(
        private readonly Log $log,
        private readonly Request $request,
        #[\SensitiveParameter] array $config = [],
    ) {
        parent::__construct($config);
    }

    public function before(): bool
    {
        $data = [
            'url' => $this->request->getAddress() . $this->request->getUri()->getQuery(),
            'method' => $this->request->getMethod(),
            // Other parameters required in the log.
        ];
        $this->log->info('Request log for the site, url: {url} method: {method}', $data);

        return true;
    }
}
