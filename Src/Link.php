<?php

declare(strict_types=1);

namespace Phphleb\Docs\Src;

use Hleb\Static\Request;
use Hleb\Static\Settings;

class Link
{
    public static function nextPage(string $routeName, string $title): string
    {
        $link = self::link($routeName, $title);

        return "<span class='hl-link-outer'>$link &rarr;</span>";
    }

    public static function previousPage(string $routeName, string $title): string
    {
        $link = self::link($routeName, $title);

        return "<span class='hl-link-outer'>&larr; $link</span>";
    }

    /**
     * @param string $routeName - минимальная версия в названии маршрута.
     */
    public static function url(string $routeName, ?string $lang = null, bool $strictVersion = false): string
    {
        $lang = $lang ?? Settings::getAutodetectLang();
        $parts = explode('.', $routeName);
        if ($strictVersion) {
            $version = (int)$parts[1];
            $subversion = (int)$parts[2];
        } else {
            $path = explode('/', trim(Request::getUri()->getPath(), '/'));
            array_shift($path);
            $version = (int)array_shift($path);
            $subversion = (int)array_shift($path);
        }
        for ($v = $version; $v >= 2; $v--) {
            for ($s = $subversion; $s >= 0; $s--) {
                $parts[1] = $v;
                $parts[2] = $s;
                $routeName = implode('.', $parts);
                try {
                    return url($routeName, ['lang' => $lang]);
                } catch (\Throwable) {
                }
            }
        }
        return '/404';
    }

    private static function link(string $routeName, string $title): string
    {
        $url = self::url($routeName);

        return "<span class='hl-link'><a href=\"$url\">$title</a></span>";
    }
}