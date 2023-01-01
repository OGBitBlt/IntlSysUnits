using System;
using OGBitBlt.IntlSysUnits.Abstract;
namespace OGBitBlt.IntlSysUnits.Time.Conversion
{
    public class DayToHour : AbstractConverter
    {
        public DayToHour() : base(24) { }

        public Hour From(Day to)
        {
            return new Hour(FloatFrom(to.Value));
        }

        public Day To(Hour from)
        {
            return new Day(FloatTo(from.Value));
        }
    }
}

