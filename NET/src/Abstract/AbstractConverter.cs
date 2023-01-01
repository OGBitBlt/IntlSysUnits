//
// AbstractConverter.cs
//
// Author:
//       Anthony Davis <ogbitblt@pm.me>
//
// Copyright (c) 2022 (C)2022 Anthony Davis
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
using OGBitBlt.IntlSysUnits.Exception;

namespace OGBitBlt.IntlSysUnits.Abstract
{
	/// <summary>
	/// abstract class that each converter will inherit
	/// </summary>
	public class AbstractConverter
	{
		/// <summary>
		/// holds the multiplier for converting units
		/// </summary>
		protected float m_multiplier { get; }

		/// <summary>
		/// Constructor
		/// </summary>
		/// <param name="multiplier">The value used to convert</param>
		public AbstractConverter(float multiplier)
		{
			this.m_multiplier = multiplier;
		}


		protected float FloatFrom(float value)
		{
			if (value == 0) throw new ConversionException("value cannot be zero when converting from.");
			return value * this.m_multiplier;
		}

		protected float FloatTo(float value)
        {
			if (value == 0) throw new ConversionException("value cannot be zero when converting to.");
			return value / this.m_multiplier;
        }
	}
}

