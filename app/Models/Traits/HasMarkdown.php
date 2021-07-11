<?php

namespace Azuriom\Models\Traits;

use Azuriom\Support\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
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
            return new HtmlString($this->parseRawMarkdown($attribute, $text, $inlineOnly));
        }

        $cached = Cache::get($this->getMarkdownCacheKey(), []);

        if (! Arr::has($cached, $attribute)) {
            $cached[$attribute] = $this->parseRawMarkdown($attribute, $text, $inlineOnly);

            Cache::put($this->getMarkdownCacheKey(), $cached, now()->addMinutes(15));
        }

        return new HtmlString(Arr::get($cached, $attribute));
    }

    public function parseRawMarkdown(string $attribute, string $content, bool $inlineOnly = false)
    {
        return Markdown::parse($content, $inlineOnly);
    }

    protected function getMarkdownCacheKey()
    {
        return "markdown.{$this->getTable()}.{$this->getKey()}";
    }
}
