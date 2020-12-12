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
        if (in_array(HasTranslations::class, class_uses_recursive($this), true)) {
            $text = $this->getTranslations($attribute);
            $locale = app()->getLocale();
        } else {
            $text = $this->getAttribute($attribute);
        }

        if ($text === null) {
            return null;
        }

        if (! app()->isProduction()) {
            if (is_array($text)) {
                return new HtmlString(Markdown::parse($text[$locale], $inlineOnly));
            }

            return new HtmlString(Markdown::parse($text, $inlineOnly));
        }
        $markdownCacheKey = $this->getMarkdownCacheKey();
        if (is_array($text)) {
            $markdownCacheKey .= ".{$locale}";
        }

        $cached = Cache::get($markdownCacheKey, []);

        if (! Arr::has($cached, $attribute)) {
            if (is_array($text)) {
                $cached[$attribute] = Markdown::parse($text[$locale], $inlineOnly);
            } else {
                $cached[$attribute] = Markdown::parse($text, $inlineOnly);
            }

            Cache::put($markdownCacheKey, $cached, now()->addMinutes(15));
        }

        return new HtmlString(Arr::get($cached, $attribute));
    }

    protected function getMarkdownCacheKey()
    {
        return "markdown.{$this->getTable()}.{$this->getKey()}";
    }
}
