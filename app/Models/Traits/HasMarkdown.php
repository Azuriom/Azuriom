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
            return new HtmlString(Markdown::parse($text, $inlineOnly));
        }

        $cached = Cache::get($this->getMarkdownCacheKey(), []);

        if (! Arr::has($cached, $attribute)) {
            $cached[$attribute] = Markdown::parse($text, $inlineOnly);

            Cache::put($this->getMarkdownCacheKey(), $cached, now()->addMinutes(15));
        }

        return new HtmlString(Arr::get($cached, $attribute));
    }

    protected function getMarkdownCacheKey()
    {
        return "markdown.{$this->getTable()}.{$this->getKey()}";
    }
}
