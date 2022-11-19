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
namespace Shouyi\Kafka\Event;

use Shouyi\Kafka\AbstractConsumer;

abstract class Event
{
    /**
     * @var AbstractConsumer
     */
    protected $consumer;

    public function __construct(AbstractConsumer $consumer)
    {
        $this->consumer = $consumer;
    }

    public function getConsumer(): AbstractConsumer
    {
        return $this->consumer;
    }
}
