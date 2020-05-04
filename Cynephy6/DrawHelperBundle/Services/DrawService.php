<?php
declare(strict_types=1);

namespace Cynephy6\DrawHelperBundle\Services;

class DrawService
{
    /** рисует прямоугольник $color цветом и закрашивает его $bgColor цветом
     *
     * @param resource $i
     * @param int $x
     * @param int $y
     * @param int $width ширина
     * @param int $height высота
     * @param int $color цвет контура
     * @param int|null $bg заливка
     */
    public static function rect($i, int $x, int $y, int $width, int $height, int $color, ?int $bg = null): void
    {
        $points = [$x, $y, $x + $width, $y, $x + $width, $y + $height, $x, $y + $height];
        imagepolygon($i, $points, 4, $color);
        if (null !== $bg) {
            imagefill($i, $x + 1, $y + 1, $bg);
        }
    }

    /** рисует равнобедренный треугольник $color цветом и закрашивает его $bgColor цветом
     *
     * @param resource $i
     * @param int $x основания
     * @param int $y основания
     * @param int $width ширина основания
     * @param int $height высота треугольника
     * @param int $color цвет контура
     * @param int|null $bg заливка
     */
    public static function triangleIso($i, int $x, int $y, int $width, int $height, int $color, ?int $bg = null): void
    {
        $points = [$x, $y, $x + (int)($width / 2), $y + $height, $x + $width, $y,];
        imagepolygon($i, $points, 3, $color);
        if (null !== $bg) {
            imagefill($i, $x + (int)($width / 2), $y + ($height > 0 ? 1 : -1), $bg);
        }
    }
}