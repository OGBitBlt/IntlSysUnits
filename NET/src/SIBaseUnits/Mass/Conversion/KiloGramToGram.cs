//
// KiloGramToGram.cs
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
using OGBitBlt.IntlSysUnits.Abstract;
namespace OGBitBlt.IntlSysUnits.Mass.Conversion
{
	/// <summary>
    /// Converts KiloGrams to Grams and vice versa
    /// </summary>
	public class KiloGramToGram : AbstractConverter
	{
		/// <summary>
        /// Sets the multiplier to 1000
        /// </summary>
		public KiloGramToGram() : base(1000) { } 

		/// <summary>
        /// Converts a kilogram to a gram
        /// </summary>
        /// <param name="to"></param>
        /// <returns></returns>
		public Gram From(KiloGram to)
		{
			return new Gram(this.FloatFrom(to.Value));
		}

		/// <summary>
        /// Converts a gram to a kilogram
        /// </summary>
        /// <param name="from"></param>
        /// <returns></returns>
		public KiloGram To(Gram from)
        {
			return new KiloGram(this.FloatTo(from.Value));
        }
	}
}

