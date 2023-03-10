//
// AbstractMass.cs
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
using OGBitBlt.IntlSysUnits.Mass.Conversion;
using OGBitBlt.IntlSysUnits.Exception;

namespace OGBitBlt.IntlSysUnits.Mass
{
	public abstract class AbstractMass : AbstractSIUnit
	{
		public AbstractMass()
		{
			this.BaseUnitType = SIBaseUnitType.Mass;
		}

		public SIUnitInterface To<T>()
		{
			return this.To(typeof(T));
		}

		public SIUnitInterface To(Type t)
		{
			switch (t.Name)
			{
				case "Gram": return this.ToGram();
				case "KiloGram": return this.ToKiloGram();
				default:
					throw new ConversionException ("Invalid conversion type.");
			}
		}

		public SIUnitInterface ToSIBase()
        {
			return this.ToGram();
        }

		public Gram ToGram()
        {
			switch (this.GetType().Name)
			{
				case "Gram": return (Gram)this;
				case "KiloGram": return new KiloGramToGram().From((KiloGram)this);
				default:
					throw new ConversionException("Cannot convert to gram.");
			}
        }

		public KiloGram ToKiloGram()
		{
			switch (this.GetType().Name)
			{
				case "Gram": return new KiloGramToGram().To((Gram)this);
				case "KiloGram": return (KiloGram)this;
				default:
					throw new ConversionException("Cannot convert to kilogram.");
			}
		}
	}
}

