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

use OGBitBlt\IntlSysUnit\Interface\SIUnitInterface;
use OGBitBlt\IntlSysUnit\SIQuantityType;

/**
 * Implements all the base methods for an SIUnit object. 
 * 
 * Each SIUnit object will have the following base methods and properties:
 *  - Value()   :   Get / Set the value of the object
 *  - Add       :   Adds an object of the same quantity type to the object
 *  - Subtract  :   Opposite of Add 
 *  - Type      :   Returns the SIQuantityType value
 */
abstract class AbstractSIUnit implements SIUnitInterface
{
    /**
     * @var:  The SI Base Unit Quantity
     */
    protected SIQuantityType $_type;

    /**
     * @var: The value 
     */
    protected float $_value = 0.0;

    /**
     * creates a new unit of measure objects
     * @param: SIQuantityType to initialize the object to
     */
    public function __construct(SIQuantityType $type)
    {
        $this->_type = $type;
    }

    /**
     * getter/setter for the value
     * @param: float $value (optional) sets the value
     * @return: if $value is null it returns the current value
     *          otherwise is sets the value to $value and returns void
     */
    public function Value(float $value = null) : self | float
    {
        if($value == null) return $this->_value;
        else {
            $this->_value = $value;
            return $this;
        }
    }
    /**
     * Implements the aritmetic add functionality for a unit of measure object
     * @param SIUnitInterface $value The unit of measure to be added
     * @return self
     */
    public function Add(SIUnitInterface $value) : self
    {
        $this->Value(
            ($this::class == $value::class) ? 
                ($this->Value() + $value->Value()) : 
                ($this->Value() + $value->To($this::class)->Value())
        );
        return $this;
    }
    /**
     * Getter function for the Type property 
     * @return SIQuantityType
     */
    public function Type() : SIQuantityType
    {
        return $this->_type;
    }
    /**
     * Implements the arithmetic subtract functionality for a unit of measure object
     * If PHP ever implements operator overloading, this and the add function should
     * be re-factored as operator overloads of +,-,++, and --
     * @param SIUnitInterface $value The unit of measure to be subtracted
     * @return self
     */
    public function Subtract(SIUnitInterface $value) : self
    {
        $this->Value(
            ($this::class == $value::class) ? 
                ($this->Value() - $value->Value()) : 
                ($this->Value() - $value->To($this::class)->Value())
        );
        return $this;
    }
}