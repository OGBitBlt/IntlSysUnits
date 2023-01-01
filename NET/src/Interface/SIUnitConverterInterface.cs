//
// SIBaseUnitConverterInterface.cs
//
// Author: Anthony Davis <ogbitblt@pm.me>
//
// Copyright (c)2022 Anthony Davis
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
namespace OGBitBlt.IntlSysUnits.Interface
{
	public interface SIUnitConverterInterface
	{
		/// <summary>
        /// divide the objects value by the object multiplier its being converted to
        /// </summary>
        /// <param name="from"></param>
        /// <returns></returns>
		public SIUnitInterface To(SIUnitInterface from);

		/// <summary>
        /// multiply the objects value by the object multiplier its being converted from
        /// </summary>
        /// <param name="to"></param>
        /// <returns></returns>
		public SIUnitInterface From(SIUnitInterface to);
	}
}

