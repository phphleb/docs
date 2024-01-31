<?php

declare(strict_types=1);

namespace Phphleb\Docs\Src;

class Paragraph
{
    public static function h1(string $text, bool $h1Tag = false): string
    {
        return self::setAnchor($text, 'h1', $h1Tag);
    }

    public static function h2(string $text): string
    {
        return self::setAnchor($text, 'h2');
    }

    public static function h3(string $text): string
    {
        return self::setAnchor($text, 'h3');
    }

    public static function setAnchor(string $text, string $tag = 'h2', bool $h1Tag = false): string
    {
        if (!$h1Tag && strtolower($tag) === 'h1') {
            return "<br><h1><span class='hl-empty-anchor'> </span>$text</h1>";
        }

        $anchor = 'section-' . self::getHash($text);
        $target = "<div id=$anchor> </div><br>";

        return "$target<$tag class=hl-hindex><a href=\"#$anchor\" class='hl-anchor'>#</a>" . $text . "</$tag>";
    }

    public static function getHash(string $text): string
    {
        return substr(sha1($text), 0, 4);
    }
}