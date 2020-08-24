<?php

namespace Azuriom\Models\Traits;

use Azuriom\Support\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\HtmlString;

/**
 * Render and cache Markdown from attributes.
 */
trait HasMarkdown
{
    protected static function bootHasMarkdown()
    {
        static::updated(function (Model $model) {
            Cache::forget($model->getMarkdownCacheKey());
        });

        static::deleted(function (Model $model) {
            Cache::forget($model->getMarkdownCacheKey());
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

        $cacheKey = $this->getMarkdownCacheKey().'.'.$attribute;

        return new HtmlString(Cache::remember($cacheKey, now()->addMinutes(5), function () use ($text, $inlineOnly) {
            return Markdown::parse($text, $inlineOnly);
        }));
    }

    protected function getMarkdownCacheKey()
    {
        return "markdown.{$this->getTable()}.{$this->getKey()}";
    }
}
