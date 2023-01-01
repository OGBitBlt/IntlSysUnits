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
namespace OGBitBlt\IntlSysUnit\Exception;

use Exception;
use OGBitBlt\IntlSysUnit\Interface\SIUnitInterface;
use Throwable;

/**
 * Incompatible Quantity Type Conversion Exception.
 * 
 * This exception is thrown by a converter object, when the converter attempts
 * to convert two objects that do not have the same SIQuanityType.
 */
class IncompatibleTypeConversionException extends Exception 
{
    /**
     * creates a new exception to be thrown
     * @param: $from The base object that the arithmetic or conversion method was called on
     * @param: $to The parameter object of the attempted function call
     * @param: $code (optional) set if this is part of a cascaded exception, i.e. as part of a try / catch
     * @param: $prev (optional) set if this is part of a cascaded exception, i.e. as part of a try / catch
     */
    public function __construct(
        SIUnitInterface $from, 
        SIUnitInterface $to, 
        ?int $code = 0, 
        ?Throwable $prev = null)
    {
        parent::__construct(
            sprintf(
                "Can not convert from %s to %s they have incompatible quantity types.", 
                $from::class, 
                $to::class
            ) ,
            $code,
            $prev
        );
    }
}
?>