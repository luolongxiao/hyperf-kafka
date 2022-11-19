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

use Shouyi\Kafka\Listener\AfterWorkerExitListener;
use Shouyi\Kafka\Listener\BeforeMainServerStartListener;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'listeners' => [
                BeforeMainServerStartListener::class => 99,
                AfterWorkerExitListener::class => 1,
            ],
            'dependencies' => [
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for kafka.',
                    'source' => __DIR__ . '/../publish/kafka.php',
                    'destination' => BASE_PATH . '/config/autoload/kafka.php',
                ],
            ],
        ];
    }
}
