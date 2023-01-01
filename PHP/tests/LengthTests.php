<?php

use OGBitBlt\IntlSysUnit\SIUnits\Length\Centimeter;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Fathom;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Foot;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Inch;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Kilometer;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Metre;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Mile;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Millimeter;
use OGBitBlt\IntlSysUnit\SIUnits\Length\NauticalMile;
use OGBitBlt\IntlSysUnit\SIUnits\Length\Yard;

require_once dirname(__DIR__) . '/tests/bootstrap.php';

function LengthTestBanner()
{
    $banner =   "\e[34m*****\e[39m_\e[34m*********************\e[39m_\e[34m***\e[39m_\e[34m*******\e[39m_____\e[34m*********\e[39m_\e[34m**********************\e[39m\n" .     
                "\e[34m****\e[39m| |\e[34m****\e[39m___\e[34m*\e[39m_\e[34m*\e[39m__\e[34m***\e[39m__\e[34m*\e[39m_| |_| |__\e[34m***\e[39m|_   _|__\e[34m**\e[39m___| |_\e[34m*\e[39m___\e[34m****************\e[39m\n" . 
                "\e[34m****\e[39m| |\e[34m***\e[39m/ _ \\ '_ \\\e[34m*\e[39m/ _` | __| '_ \\    | |/ _ \\/ __| __/ __|\e[34m***************\e[39m\n" . 
                "\e[34m****\e[39m| |__|  __/ | | | (_| | |_| | | |   | |  __/\\__ \\ |_\\__ \\\e[34m***************\e[39m\n" . 
                "\e[34m****\e[39m|_____\\___|_| |_|\\__, |\\__|_| |_|   |_|\\___||___/\\__|___/\e[34m***************\e[39m\n" . 
                "\e[34m*********************\e[39m|___/\e[34m**************************************************\e[39m" ;
    printf("\n\n%s\n",$banner);
}

function main() 
{
    UnitTests::InitTestSuite("Unit Of Measure: Length");
    LengthTestBanner();

    $meter = new Metre(1);
    UnitTests::FloatEqual(1,$meter->Value(),"Check the float value of 1 meter");
    UnitTests::IntEqual(1,$meter->Value(),"Check the int value of 1 meter");
    UnitTests::FloatEqual(100,$meter->ToCentimeter()->Value(),"Check float conversion of 1m to cm");
    UnitTests::FloatEqual(1000,$meter->ToMillimeter()->Value(),"Check 1m is 1000mm");
    UnitTests::FloatEqual(39.3701,$meter->ToInch()->Value(),"Check inch conversion from 1m");
    UnitTests::FloatEqual(0.546807,$meter->ToFathom()->Value(),"Check conversion 1m to fathom");

    $cm = new Centimeter(100);
    UnitTests::FloatEqual(100,$cm->Value(), "Check the float value of 100 cm");
    UnitTests::IntEqual(100,$cm->Value(), "Check the int value of 100 cm");
    UnitTests::FloatEqual(1, $cm->ToMeter()->Value(), "Check float conversion of 100cm to m");
    UnitTests::FloatEqual(1000,$cm->ToMillimeter()->Value(),"Check 100cm is 1000mm");
    UnitTests::FloatEqual(39.3701,$cm->ToInch()->Value(),"Convert 100cm to 39.3701 inches");
    UnitTests::FloatEqual(0.546807,$cm->ToFathom()->Value(),"Check Convert 100cm to fathom");

    $meter->Add($cm);
    UnitTests::FloatEqual(2,$meter->Value(),"Add 100cm to 1m and verify it's 2m");
    UnitTests::FloatEqual(200,$meter->ToCentimeter()->Value(),"Add 100cm to 1m and verify its 200cm");
    
    $meter->Subtract(new Centimeter(50));
    UnitTests::FloatEqual(1.5, $meter->Value(),"After subtracting 50cm from 2m");
    UnitTests::FloatEqual(150, $meter->ToCentimeter()->Value(),"Check 50cm from 2m is 150cm");

    $mm = new Millimeter(1);
    UnitTests::FloatEqual(1,$mm->Value(),"Check the float value of 1 mm");
    UnitTests::IntEqual(1,$mm->Value(), "Check the int value of 1mm");
    UnitTests::FloatEqual(0.001, $mm->ToMeter()->Value(),"Check mm to m conversion");
    UnitTests::FloatEqual(0.1, $mm->ToCentimeter()->Value(), "Check mm to cm conversion");
    UnitTests::FloatEqual(0.0393701,$mm->ToInch()->Value(),"Check mm to inch conversion");
    UnitTests::FloatEqual(0.000546807,$mm->ToFathom()->Value(),"Check mm to fathom conversion");
    
    $meter->Add($mm);
    UnitTests::FloatEqual(1.501,$meter->Value(),"check adding 1 mm to 1.5m");

    $inch = new Inch(1);
    UnitTests::FloatEqual(1, $inch->Value(),"Check the float value of 1 inch");
    UnitTests::IntEqual(1, $inch->Value(),"Check the int value of 1 inch");
    UnitTests::FloatEqual(0.0254, $inch->ToMeter()->Value(),"Check converting 1 inch to meter");
    UnitTests::FloatEqual(25.4, $inch->ToMillimeter()->Value(),"Check inch to mm conversion");
    UnitTests::FloatEqual(2.54, $inch->ToCentimeter()->Value(), "Check inch to cm conversion");
    UnitTests::FloatEqual(0.0138889,$inch->ToFathom()->Value(), "Check inch to fathom conversion");

    $fathom = new Fathom(1);
    UnitTests::FloatEqual(1, $fathom->Value(),"Check the value of 1 fathom");
    UnitTests::FloatEqual(1.8288, $fathom->ToMeter()->Value(),"Check conversion of 1 fathom to meter");

    // Foot 
    $foot = new Foot(1);
    UnitTests::FloatEqual(1, $foot->Value(),"Check the value of 1 foot");

    // Kilometer
    $km = new Kilometer(1);
    UnitTests::FloatEqual(1, $km->Value(),"Check the value of 1 kilometer");

    // Mile
    $mile = new Mile(1);
    UnitTests::FloatEqual(1, $mile->Value(),"Check the value of 1 mile");

    // Nautical Mile
    $nm = new NauticalMile(1);
    UnitTests::FloatEqual(1, $nm->Value(),"Check the value of 1 nautical mile");

    // Yard
    $yard = new Yard(1);
    UnitTests::FloatEqual(1, $yard->Value(),"Check the value of 1 yard");


    UnitTests::ShowResults();
}

/* ------ Main Entry Point ---------*/
main();

?>