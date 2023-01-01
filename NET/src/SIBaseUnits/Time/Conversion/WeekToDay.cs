using System;
using OGBitBlt.IntlSysUnits.Abstract;
namespace OGBitBlt.IntlSysUnits.Time.Conversion
{
    public class WeekToDay : AbstractConverter
    {
        public WeekToDay() : base(7) { }

        public Day From(Week to)
        {
            return new Day(FloatFrom(to.Value));
        }

        public Week To(Day from)
        {
            return new Week(FloatTo(from.Value));
        }
    }
}

