<?php

namespace App\Decorator;


class DangerousHtmlTagsFilter extends TextFormat
{
    private $dangerousTagPatterns = [
        "|<script.*?>([\s\S]*)?</script>|i",
    ];

    private $dangerousAttributes = [
        "onclick",
        "onkeypress",
    ];


    public function formatText(string $text): string
    {
        $text = parent::formatText($text);

        foreach ($this->dangerousTagPatterns as $pattern) {
            $text = preg_replace($pattern, '', $text);
        }

        foreach ($this->dangerousAttributes as $attribute) {
            $text = preg_replace_callback('|<(.*?)>|', function ($matches) use ($attribute) {
                $result = preg_replace("|$attribute=|i", '', $matches[1]);
                return "<" . $result . ">";
            }, $text);
        }

        return $text;
    }
}