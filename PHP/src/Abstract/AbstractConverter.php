<?php
/*
 * Copyright (c) 2022 Anthony Davis <ogbitblt@pm.me>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to 
 * deal in the Software without restriction, including without limitation the 
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or 
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in 
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 */
namespace OGBitBlt\IntlSysUnit\Abstract;

use OGBitBlt\IntlSysUnit\Exception\ConversionArgumentZeroException;

/**
 * Abtract class that all converter objects extend
 * 
 * Implements the base methods for converter objects.
 */
abstract class AbstractConverter 
{
    /**
     * @var: the multiplier value used to convert values
     */
    protected $multiplier = 0.0;

    /**
     * Creates a new abstract converter
     * @param: The multiplier value 
     */
    public function __construct($multiplier)
    {
        $this->multiplier = $multiplier;
    }

    /**
     * Converts the value by dividing it by the multiplier.
     * @param: The value to convert from
     */
    protected function FloatFrom(float $v) : float
    {
        if($v == 0) throw new ConversionArgumentZeroException("argument cannot be zero when converting From.");
        return $v*$this->multiplier;
    }

    /**
     * Converts the value by multiplying it by the multiplier
     * @param: The value to convert from
     */
    protected function FloatTo(float $v) : float
    {
        if($v == 0) throw new ConversionArgumentZeroException("argument cannot be zero when converting To.");
        return $v/$this->multiplier;
    }
}
?>