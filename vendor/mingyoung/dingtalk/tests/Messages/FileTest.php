<?php

/*
 * This file is part of the mingyoung/dingtalk.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyDingTalk\Tests\Messages;

use EasyDingTalk\Messages\File;
use EasyDingTalk\Tests\TestCase;

class FileTest extends TestCase
{
    /** @test */
    public function staticMake()
    {
        $message = File::make('media-id');
        $expected = [
            'msgtype' => 'file',
            'file' => [
                'media_id' => 'media-id',
            ],
        ];

        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }

    /** @test */
    public function new()
    {
        $message = new File('media-id');
        $expected = [
            'msgtype' => 'file',
            'file' => [
                'media_id' => 'media-id',
            ],
        ];

        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }
}
