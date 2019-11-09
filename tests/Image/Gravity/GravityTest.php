<?php

declare(strict_types=1);

namespace Shapecode\Imagine\ThumbnailGravity\Tests\Image\Gravity;

use Imagine\Image\Box;
use PHPStan\Testing\TestCase;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\BottomLeft;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\BottomMiddle;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\BottomRight;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\MiddleLeft;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\MiddleMiddle;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\MiddleRight;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\TopLeft;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\TopMiddle;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\TopRight;

class GravityTest extends TestCase
{
    public function testBottomLeft() : void
    {
        $box  = new Box(100, 100);
        $box2 = new Box(25, 25);

        $gravity    = new BottomLeft($box);
        $startPoint = $gravity->getStartPoint($box2);
        $endPoint   = $gravity->getEndPoint($box2);

        self::assertSame($startPoint->getX(), 0);
        self::assertSame($startPoint->getY(), 75);

        self::assertSame($endPoint->getX(), 25);
        self::assertSame($endPoint->getY(), 100);
    }

    public function testBottomMiddle() : void
    {
        $box  = new Box(100, 100);
        $box2 = new Box(25, 25);

        $gravity    = new BottomMiddle($box);
        $startPoint = $gravity->getStartPoint($box2);
        $endPoint   = $gravity->getEndPoint($box2);

        self::assertSame($startPoint->getX(), 37);
        self::assertSame($startPoint->getY(), 75);

        self::assertSame($endPoint->getX(), 62);
        self::assertSame($endPoint->getY(), 100);
    }

    public function testBottomRight() : void
    {
        $box  = new Box(100, 100);
        $box2 = new Box(25, 25);

        $gravity    = new BottomRight($box);
        $startPoint = $gravity->getStartPoint($box2);
        $endPoint   = $gravity->getEndPoint($box2);

        self::assertSame($startPoint->getX(), 75);
        self::assertSame($startPoint->getY(), 75);

        self::assertSame($endPoint->getX(), 100);
        self::assertSame($endPoint->getY(), 100);
    }

    public function testMiddleLeft() : void
    {
        $box  = new Box(100, 100);
        $box2 = new Box(25, 25);

        $gravity    = new MiddleLeft($box);
        $startPoint = $gravity->getStartPoint($box2);
        $endPoint   = $gravity->getEndPoint($box2);

        self::assertSame($startPoint->getX(), 0);
        self::assertSame($startPoint->getY(), 37);

        self::assertSame($endPoint->getX(), 25);
        self::assertSame($endPoint->getY(), 62);
    }

    public function testMiddleMiddle() : void
    {
        $box  = new Box(100, 100);
        $box2 = new Box(25, 25);

        $gravity    = new MiddleMiddle($box);
        $startPoint = $gravity->getStartPoint($box2);
        $endPoint   = $gravity->getEndPoint($box2);

        self::assertSame($startPoint->getX(), 37);
        self::assertSame($startPoint->getY(), 37);

        self::assertSame($endPoint->getX(), 62);
        self::assertSame($endPoint->getY(), 62);
    }

    public function testMiddleRight() : void
    {
        $box  = new Box(100, 100);
        $box2 = new Box(25, 25);

        $gravity    = new MiddleRight($box);
        $startPoint = $gravity->getStartPoint($box2);
        $endPoint   = $gravity->getEndPoint($box2);

        self::assertSame($startPoint->getX(), 75);
        self::assertSame($startPoint->getY(), 37);

        self::assertSame($endPoint->getX(), 100);
        self::assertSame($endPoint->getY(), 62);
    }

    public function testTopLeft() : void
    {
        $box  = new Box(100, 100);
        $box2 = new Box(25, 25);

        $gravity    = new TopLeft($box);
        $startPoint = $gravity->getStartPoint($box2);
        $endPoint   = $gravity->getEndPoint($box2);

        self::assertSame($startPoint->getX(), 0);
        self::assertSame($startPoint->getY(), 0);

        self::assertSame($endPoint->getX(), 25);
        self::assertSame($endPoint->getY(), 25);
    }

    public function testTopMiddle() : void
    {
        $box  = new Box(100, 100);
        $box2 = new Box(25, 25);

        $gravity    = new TopMiddle($box);
        $startPoint = $gravity->getStartPoint($box2);
        $endPoint   = $gravity->getEndPoint($box2);

        self::assertSame($startPoint->getX(), 37);
        self::assertSame($startPoint->getY(), 0);

        self::assertSame($endPoint->getX(), 62);
        self::assertSame($endPoint->getY(), 25);
    }

    public function testTopRight() : void
    {
        $box  = new Box(100, 100);
        $box2 = new Box(25, 25);

        $gravity    = new TopRight($box);
        $startPoint = $gravity->getStartPoint($box2);
        $endPoint   = $gravity->getEndPoint($box2);

        self::assertSame($startPoint->getX(), 75);
        self::assertSame($startPoint->getY(), 0);

        self::assertSame($endPoint->getX(), 100);
        self::assertSame($endPoint->getY(), 25);
    }
}
