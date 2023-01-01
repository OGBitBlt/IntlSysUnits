# International System of Units API Library
## VERSION INFO
 - VERSION: ***DEVELOPMENT***
 - RELEASE DATE: ***DECEMBER 25, 2022 (MERRY CHRISTMAS)***
## SUMMARY
The international system of units, known by the international abbreviation
SI in all languages and sometimes pleonastically as SI System, is the 
modern form of the metric system and the world's most widely used system 
of measurement. Established and maintained by the general conference on 
weights and measures (CGPM), it is the only system of measurement with an 
official status in nearly every country in the world, employed in science, 
technology, industry, and everyday commerce.

The SI comprises a coherent system of units of measurement starting with 
seven (7) base units, which are the:
	- second (symbol s, the unit of time), 
	- metre (m, length), 
	- kilogram (kg, mass), 
	- ampere (A, electric current), 
	- kelvin (K, thermodynamic temperature), 
	- mole (mol, amount of substance), 
	- and candela (cd, luminous intensity)

The system can accommodate coherent units for an unlimited number of 
additional quantities. These are called coherent derived units, which can 
always be represented as products or powers of the base units. Twenty-two 
coherent derived units have been provided with special names and symbols.

This API library provides an interface that implements the international 
system of units in many popular programming languages. Originally 
developed by Anthony Davis in 2022, the first version was released in PHP,
later that year he added C# and Typescript with Go and Rust being 
introduced in 2023.

This library is completely open source, and has been hosted on Github 
since it's inception, we have no financial supporters or sponsors, it was
created because I had a need in a software project I was working on and
thought that others may have a similar need. If you are interested in 
contributing I would welcome the support. 

All of this code was developed by volunteers and are provided to you for 
free to use in your own software applications. Please review the license 
terms that are included in the root directory for this library as well as
in the header of the source code files. 

Our goal is to make the library very user friendly, there are 7 base 
system of unit types Time, Length, Mass, ElectricCurrent, Temperature, 
AmountOfSubstance, and LuminousIntensity.

Each of these base system of unit types has a number of objects that can 
be created as part of the base system type, for example in time, the base 
unit is second and is represented by the object class called Second. There
are also Minute, Hour, Day, Week, Month, and Year objects, any of these 
objects can be added together, subtracted from, or converted into. But you
cannot convert an object from one base system of unit type to another, for
example, you cannot convert Second (Time) into Metre (Length), but you can
convert Second into any of the other objects that are part of the Time base
unit.

In fact, each object, has helper methods to do exactly that.
Example PHP
```PHP
	$second = new Second(60);
	// $second->Value will equal 60
	$minute = $second->ToMinute();
	// $minute->Value will equal 1 
```
The same thing in C#
```C#
	Second second = new Second(60);
	Minute minute = second.ToMinute();
```
Each object also has helper methods for adding and subtracting, the same 
rules apply, you can add or subtract objects from each other that are based
on the same base system of unit type.

Example PHP:
```PHP
	$second = new Second(60);
	$second->Add(new Minute(1));
	// $second->Value will equal 120
	$second->Subtract(new Minute(.5));
	// $second->Value will equal 90
```
The same thing in C#
```C#
	Second second = new Second(60);
	second.Add(new Minute(1));
	second.Subtract(new Minute(.5));
```
I hope that you find this library useful, if you find any bugs, please tell
me, I will do my best to get them fixed. You can reach me at my email 
address ogbitblt@pm.me. 

Happy Coding,

Anthony Davis
Seattle Washington 
USA

 
