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

abstract class Consume extends Event
{
    /**
     * @var mixed
     */
    protected $data;

    public function __construct(AbstractConsumer $consumer, $data)
    {
        parent::__construct($consumer);
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
