<?php

use OGBitBlt\IntlSysUnit\Mass\Gram;

require_once dirname(__DIR__) . '/tests/bootstrap.php';


function MassTestsBanner()
{
    $banner =   " __  __    _    ____ ____    _   _       _ _     _____         _\n" .            
                "|  \/  |  / \  / ___/ ___|  | | | |_ __ (_) |_  |_   _|__  ___| |_ ___\n" .        
                "| |\/| | / _ \\ \\___ \\___ \\  | | | | '_ \\| | __|   | |/ _ \\/ __| __/ __|\n" .      
                "| |  | |/ ___ \\ ___) |__) | | |_| | | | | | |_    | |  __/\\__ \\ |_\\__ \\_ _ _\n" .  
                "|_|  |_/_/   \\_\\____/____/   \\___/|_| |_|_|\\__|   |_|\\___||___/\\__|___(_|_|_)";
    printf("\n\n%s\n",$banner);
}

function main() 
{
    MassTestsBanner();
    UnitTests::InitTestSuite("Unit Of Measure: Mass");
    $gram = new Gram(1000);
    UnitTests::FloatEqual(1000,$gram->Value(), "Check that value is correct");
    UnitTests::FloatEqual(1, $gram->ToKiloGram()->Value(), "1000 gram to Kilo ");
    UnitTests::FloatEqual(2.20462, $gram->ToPound()->Value(),"1000 gram to pounds ");

    $gram->Add(new Gram(1000));
    UnitTests::FloatEqual(2, $gram->ToKiloGram()->Value(), "Add 1000 grams and check kilos ");
    UnitTests::FloatEqual(4.409245, $gram->ToPound()->Value(),"Check the same value converted to lbs ");

    $kilo = new KiloGram(1);
    UnitTests::FloatEqual(1000, $kilo->ToGram()->Value(), "1 kilo to 1000 grams");
    UnitTests::FloatEqual(2.20462,$kilo->ToPound()->Value(),"1 kilo to pounds");
    UnitTests::FloatEqual(2000, $gram->Value(), "before adding a kilo");
    UnitTests::FloatEqual(1000, $gram->Subtract($kilo)->Value(), "after subtracting a kilo: grams " .$gram->Value());
    
    $pound = new Pound(1);
    UnitTests::FloatEqual(546.408,$gram->Subtract($pound)->Value(), "after subtracting a lb.");
    
    $g1 = new Gram(1);
    UnitTests::FloatEqual(545.408, $gram->Subtract($g1)->Value(), "after subtracting a gram");

    $gram->Add(new Pound(1));
    UnitTests::FloatEqual(999, $gram->Value(), "after adding a lb");
    UnitTests::FloatEqual(1999, $gram->Add(new KiloGram(1))->Value(), "after adding a kilo");
    UnitTests::FloatEqual(2000, $gram->Add(new Gram(1))->Value(), "after adding a gram");

    $kilo->Add(new KiloGram(0.5));
    UnitTests::FloatEqual(1500, $kilo->ToGram()->Value(), "Added half a kilo to a kilo");
    UnitTests::FloatEqual(3.306934, $kilo->ToPound()->Value(), "And converted to lbs");
    
    $ton = new Ton(1);
    $metricTon = new MetricTon(1);
    UnitTests::FloatEqual(907185,$ton->ToGram()->Value(), "Check the value of 1 ton.");
    UnitTests::FloatEqual(1000000,$metricTon->ToGram()->Value(), "Check the value of 1 metric ton");
    
    $kilo->Add($metricTon);
    UnitTests::FloatEqual(1001500,$kilo->ToGram()->Value(), "After adding a metric ton to a kilo");
    UnitTests::FloatEqual(1001.5, $kilo->Value(), "Check kilo value");
    UnitTests::FloatEqual(2207.9314, $kilo->ToPound()->Value(), "Check pound value");
    
    $kilo->Add($ton);
    UnitTests::FloatEqual(1908685, $kilo->ToGram()->Value(), "Added a ton ");
    
    $kilo->Subtract($metricTon);
    UnitTests::FloatEqual(908685, $kilo->ToGram()->Value(), "Subtracted a metric ton");
    
    $kilo->Subtract($ton);
    UnitTests::FloatEqual(1500, $kilo->ToGram()->Value(), "Subtracted a ton ");

    UnitTests::ShowResults();
}

main();

?>