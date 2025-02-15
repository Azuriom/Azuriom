<?php

namespace Tests\Unit;

use Azuriom\Rules\Slug;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Validator;
use Tests\TestCase;

class RulesTest extends TestCase
{
    public function test_slug_rule(): void
    {
        $validSlugs = ['hello-world', 'hello', 'world', '-hello-world-', '123456'];
        $invalidSlugs = ['Hello', 'hello_world', 'Hello World', 'hello@world'];

        foreach ($validSlugs as $slug) {
            $this->assertTrue($this->validateRule($slug, new Slug()));
        }

        foreach ($invalidSlugs as $slug) {
            $this->assertFalse($this->validateRule($slug, new Slug()));
        }
    }

    protected function validateRule(string $value, ValidationRule $rule): bool
    {
        $translator = new Translator(new ArrayLoader(), 'en');

        return (new Validator($translator, ['x' => $value], ['x' => $rule]))->passes();
    }
}
