<?php

namespace Tests\Unit;

use Azuriom\Support\SettingsRepository;
use PHPUnit\Framework\TestCase;

class SettingsTest extends TestCase
{
    /**
     * @var \Azuriom\Support\SettingsRepository
     */
    protected $repository;

    protected function setUp(): void
    {
        $settings = [
            'foo' => 'bar',
            'null' => null,
            'associate' => [
                'x' => 'xxx',
                'y' => 'yyy',
            ],
            'array' => ['aaa', 'bbb'],
        ];

        $this->repository = new SettingsRepository(collect($settings));

        parent::setUp();
    }

    public function testHas()
    {
        $this->assertTrue($this->repository->has('foo'));

        $this->assertFalse($this->repository->has('missing'));
    }

    public function testGet()
    {
        $this->assertSame('bar', $this->repository->get('foo'));

        $this->assertSame('default', $this->repository->get('missing', 'default'));
    }

    public function testSet()
    {
        $this->repository->set('key', 'value');

        $this->assertSame('value', $this->repository->get('key'));
    }

    public function testSetArray()
    {
        $this->repository->set([
            'key1' => 'value1',
            'key2' => 'value2',
        ]);
        $this->assertSame('value1', $this->repository->get('key1'));
        $this->assertSame('value2', $this->repository->get('key2'));
    }
}
