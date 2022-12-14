<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Shouyi\Kafka;

use Psr\Container\ContainerInterface;

class ProducerManager
{
    /**
     * @var array<string, Producer>
     */
    private $producers = [];

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getProducer(string $name = 'default'): Producer
    {
        if (isset($this->producers[$name])) {
            return $this->producers[$name];
        }
        $this->producers[$name] = make(Producer::class, ['name' => $name]);
        return $this->producers[$name];
    }

    public function closeAll(): void
    {
        foreach ($this->producers as $producer) {
            $producer->close();
        }
    }
}
