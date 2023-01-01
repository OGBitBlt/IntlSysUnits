using System;
using OGBitBlt.IntlSysUnits.Abstract;
namespace OGBitBlt.IntlSysUnits.Time.Conversion
{
	public class MinuteToSecond : AbstractConverter
	{
		public MinuteToSecond() : base(60)
		{
		}

		public Second From(Minute to)
		{
			return new Second(FloatFrom(to.Value));
		}

		public Minute To(Second from)
		{
			return new Minute(FloatTo(from.Value));
		}
	}
}

