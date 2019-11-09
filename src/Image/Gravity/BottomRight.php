<?php

declare(strict_types=1);

namespace Shapecode\Imagine\ThumbnailGravity\Image\Gravity;

use Imagine\Image\BoxInterface;
use Imagine\Image\Point;
use Imagine\Image\PointInterface;

class BottomRight extends AbstractGravity
{
    public function getX() : int
    {
        return $this->box->getWidth();
    }

    public function getY() : int
    {
        return $this->box->getHeight();
    }

    public function getStartPoint(BoxInterface $box) : PointInterface
    {
        return new Point($this->getX() - $box->getWidth(), $this->getY() - $box->getHeight());
    }

    public function getEndPoint(BoxInterface $box) : PointInterface
    {
        return new Point($this->getX(), $this->getY());
    }
}
