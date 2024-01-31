<?php

declare(strict_types=1);

namespace Phphleb\Docs\Src;

use Hleb\Helpers\ResourceViewHelper;
use Hleb\HttpMethods\External\SystemRequest;
use Hleb\Static\Settings;

final class Resources
{
    public function __construct(private readonly SystemRequest $request)
    {
    }

    /**
     * Returns the result of a system query to the library.
     *
     * Возвращает результат вызова системного запроса к библиотеке.
     */
    public function get(): bool
    {
        $path = $this->request->getUri()->getPath();
        $address = \explode('/', \trim($path, '/'));

        $part = \array_pop($address);
        $ext = \array_pop($address);

        $path = match ($part . '.' . $ext) {
            'main.css' => '@library/docs/web/css/main.css',
            'index.css' => '@library/docs/web/css/index.css',
            'main.js' => '@library/docs/web/js/main.js',
            'search.js' => '@library/docs/web/js/search.js',
            'plunger.svg' => '@library/docs/web/svg/plunger.svg',
            'ui.font' => '@library/docs/web/fonts/ui.woff2',
            default => null,
        };
        if (!$path) {
            return false;
        }
        $file = Settings::getRealPath($path);
        if (!$file) {
            return false;
        }
        return (new ResourceViewHelper())->add($file);
    }
}