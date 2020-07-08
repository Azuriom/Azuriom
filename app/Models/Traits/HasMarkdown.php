<?php

namespace Azuriom\Models\Traits;

use Azuriom\Support\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\HtmlString;

trait HasMarkdown
{
    protected static function bootHasMarkdownContent()
    {
        static::updated(function (Model $model) {
            Cache::forget($model->getDescriptionCacheKey());
        });
    }

    public function parseMarkdown(string $attribute, bool $inlineOnly = false)
    {
        $text = $this->getAttribute($attribute);

        if ($text === null) {
            return null;
        }

        if (! app()->isProduction()) {
            return new HtmlString(Markdown::parse($text, $inlineOnly));
        }

        return new HtmlString(Cache::remember($this->getDescriptionCacheKey(), now()->addMinutes(5), function () {
            return Markdown::parse($text);
        }));
    }

    protected function getDescriptionCacheKey()
    {
        return "{$this->getTable()}.markdown.{$this->getKey()}";
    }
}
