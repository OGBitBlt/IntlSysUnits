//
// AbstractTime.cs
//
// Author: Anthony Davis <ogbitblt@pm.me>
//
// Copyright (c) 2022 Anthony Davis
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.
using System;
using OGBitBlt.IntlSysUnits.Interface;
using OGBitBlt.IntlSysUnits.Abstract;
using OGBitBlt.IntlSysUnits.Exception;
using OGBitBlt.IntlSysUnits.Time.Conversion;

namespace OGBitBlt.IntlSysUnits.Time
{
    public abstract class AbstractTime : AbstractSIUnit
    {
        public AbstractTime()
        {
            this.BaseUnitType = SIBaseUnitType.Time;
        }

        public SIUnitInterface To<T>()
        {
            return this.To(typeof(T));
        }

        public SIUnitInterface To(Type t)
        {
            switch (t.Name)
            {
                case "Second": return this.ToSecond();
                case "Minute": return this.ToMinute();
                default:
                    throw new ConversionException("Invalid conversion type.");
            }
        }

        public SIUnitInterface ToSIBase()
        {
            return this.ToSecond();
        }

        public Minute ToMinute()
        {
            switch (this.GetType().Name)
            {
                case "Second": return new MinuteToSecond().To((Second)this);
                default:
                    throw new ConversionException("Cannot convert to minute.");
            }
        }

        public Second ToSecond()
        {
            switch (this.GetType().Name)
            {
                case "Second": return (Second)this;
                default:
                    throw new ConversionException("Cannot convert to second.");
            }
        }
    }
}

