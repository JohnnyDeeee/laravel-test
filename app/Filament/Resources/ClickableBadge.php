<?php

class ClickableBadge
{
    public static function createHtmlBadge(string $url, string $name): string
    {
        return "<a href='{$url}' class='inline-block text-white bg-primary-600 rounded px-2 py-1 text-xs font-semibold mr-1'>{$name}</a>";
    }
}
