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
namespace OGBitBlt\IntlSysUnit\Interface;

use OGBitBlt\IntlSysUnit\Interface\SIUnitInterface;

/**
 * Defines the signature for a unit converter object.
 * 
 * A unit converter object is responsible for converting units within
 * the same SI quantity type from one unit to another.
 * The converter will have 2 methods:
 *  - To()  :   divides the objects value by the base unit multiplier
 *  - From():   multiplies the objects value by the base unit multiplier
 */
interface SIUnitConverterInterface
{
    /**
     * Convert To another unit of the same quantity type
     * 
     * Conversion is performed by dividing the object value by the base unit 
     * multiplier for the object type. 
     * 
     * @param SIUnitInterface $from the SIBaseUnit to convert from
     * @return SIUnitInterface new object created as a result of the conversion
     */
    public function To(SIUnitInterface $from) : SIUnitInterface;
    
    /**
     * Convert From another unit of the same quantity type
     * 
     * Conversion is performed by multiplying the object value by the base unit 
     * multiplier for the object type. 
     * 
     * @param SIUnitInterface $to the SIBaseUnit to convert to
     * @return SIUnitInterface new object created as a result of the conversion
     */
    public function From(SIUnitInterface $to) : SIUnitInterface;
}
?>