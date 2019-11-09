<?php

declare(strict_types=1);

namespace Shapecode\Imagine\ThumbnailGravity\Filter\Advanced;

use Imagine\Filter\FilterInterface;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\ManipulatorInterface;
use Shapecode\Imagine\ThumbnailGravity\Image\Gravity\GravityInterface;

class ThumbnailGravity implements FilterInterface
{
    /** @var GravityInterface */
    private $gravity;

    public function __construct(GravityInterface $gravity)
    {
        $this->gravity = $gravity;
    }

    public function apply(ImageInterface $image) : ManipulatorInterface
    {
        $currentSize = $image->getSize();

        $ratioCurrent = $currentSize->getHeight() / $currentSize->getWidth();
        $ratioNew     = $this->gravity->getRatio();

        // ratio inverse of original and thumb image
        $ratioInverseNew = 1 / $ratioNew;

        // image has to crop
        if ($this->gravity->equalsRation($ratioCurrent)) {
            if ($this->gravity->isWeightGreaterThanHeight()) {
                $cropHeight = $currentSize->getWidth() * $ratioNew;
                $cropWidth  = $currentSize->getWidth();

                if ($cropHeight > $currentSize->getHeight()) {
                    $correction  = 1 / ($cropHeight / $currentSize->getHeight());
                    $cropWidth  *= $correction;
                    $cropHeight *= $correction;
                }
            } else {
                $cropWidth  = $currentSize->getHeight() * $ratioInverseNew;
                $cropHeight = $currentSize->getHeight();

                if ($cropWidth > $currentSize->getWidth()) {
                    $correction  = 1 / ($cropWidth / $currentSize->getWidth());
                    $cropWidth  *= $correction;
                    $cropHeight *= $correction;
                }
            }

            $cropWidth  = (int) $cropWidth;
            $cropHeight = (int) $cropHeight;

            $cropSize   = new Box($cropWidth, $cropHeight);
            $startPoint = $this->gravity->getStartPoint($cropSize);

            $image = $image->crop($startPoint, $cropSize);
        }

        return $image->resize($this->gravity->getSize());
    }
}
