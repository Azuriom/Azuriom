<?php

namespace Tests\Unit;

use Azuriom\Rules\Color;
use Azuriom\Rules\Slug;
use Azuriom\Rules\Username;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Validator;
use Tests\TestCase;

class RulesTest extends TestCase
{
    public function testColorRule()
    {
        $validColors = ['#ffffff', '#000000', '#ff0000'];
        $invalidColors = ['#fff', 'fff', 'ff0000', '#f000', '#hh0000'];

        foreach ($validColors as $color) {
            $this->assertTrue($this->validateRule($color, new Color()));
        }

        foreach ($invalidColors as $color) {
            $this->assertFalse($this->validateRule($color, new Color()));
        }
    }

    public function testSlugRule()
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

    public function testUsernameRule()
    {
        $validNames = ['Hello', 'Hello1234', 'Hello_1234'];
        $invalidNames = ['H€llo', 'hello@world', 'Hello#World'];

        foreach ($validNames as $name) {
            $this->assertTrue($this->validateRule($name, new Username()));
        }

        foreach ($invalidNames as $name) {
            $this->assertFalse($this->validateRule($name, new Username()));
        }
    }

    protected function validateRule($value, $rules)
    {
        $translator = new Translator(new ArrayLoader(), 'en');
        $validator = new Validator($translator, ['x' => $value], ['x' => $rules]);

        return $validator->passes();
    }
}
