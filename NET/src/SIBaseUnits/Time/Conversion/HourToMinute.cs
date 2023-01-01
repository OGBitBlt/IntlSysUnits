using System;
using OGBitBlt.IntlSysUnits.Abstract;
namespace OGBitBlt.IntlSysUnits.Time.Conversion
{
    public class HourToMinute : AbstractConverter
    {
        public HourToMinute() : base(60) { }

        public Minute From(Hour to)
        {
            return new Minute(FloatFrom(to.Value));
        }

        public Hour To(Minute from)
        {
            return new Hour(FloatTo(from.Value));
        }
    }
}


