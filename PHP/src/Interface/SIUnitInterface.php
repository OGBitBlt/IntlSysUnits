<?php
/*
 * Copyright (c) 2022 Anthony Davis <ogbitblt@pm.me>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
namespace OGBitBlt\IntlSysUnit\Interface;

use OGBitBlt\IntlSysUnit\SIQuantityType;

/**
 * Defines the interface for all base and derived SIUnitTypes
 * 
 * This interface is implemented by every SI unit type object. 
 * It creates the signature for the following properties:
 *  - Type()    : readonly property of SIBaseUnitType 
 *  - Value()   : acts as the getter and setter of the value stored 
 *  - To()      : converts between two derived objects within the same SIBaseUnitType
 *  - ToSIBase(): converts the current object to the SIBase object
 */
interface SIUnitInterface 
{
    /**
     * Defines the System International Base Unit Type of the object. 
     * 
     * @return: The SIBaseUnitType for the SIBaseUnit object
     */
    public function Type() : SIQuantityType;
    
    /**
     * Get / Set Method for the value of the object. 
     * 
     * @param: Value (optional) the value to set for the unit of measure.
     * @return: If $value is null it returns the IntlSysUnit value; null otherwise.
     */
    public function Value(?float $value = null) : float | self;
    
    /**
     * Converts between two units of the same quantity type.
     * 
     * @param: classType, the object class type to convert into
     * @return: a new SIUnitInterface object of class type specified by classType
     */
    public function To(string $classType) : SIUnitInterface;
    
    /**
     * Converts the current object into the base unit of the quantity type.
     * 
     * @return: Returns the current object converted to the SI base 
     */
    public function ToSIBase() : SIUnitInterface;
}
?>