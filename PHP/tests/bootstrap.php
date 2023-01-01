<?php
/**
 * Copyright (c) Anthony Davis <ogbitblt@pm.me>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * This is a minimal unit-testing framework for PHP projects
 * that use composer. This file will load dependancies from autoload.php 
 * so that each unit test does not have to. It provides functions to check
 * expected return values of of float, int, bool, or string (will add 
 * exception soon). Keeps track of how many tests have been performed.
 * And finally provides a fancy little tests results summary at the end.
 * The goal was to keep things simple, lightweight, and everything 
 * contained within a single file.
 *
 * Expected project folder structure layout is something like:
 * <Project Name>
 *      |--> src    <project source code>
 *      |--> tests  <this file and unit test files: <TestSuite>Tests.php>
 *      |--> vendor <project dependancies including autoload.php>
 * 
 * @author Anthony Davis - <ogbitblt@pm.me>
 * @package UnitTests
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';
/**
 * Implements an object to store test results 
 */
class TestResults 
{
    /**
     * Keeps track of the total number of tests executed
     * @var integer
     */
    private int $testsExecuted = 0;
    /**
     * Keeps track of the total number of tests passed
     * @var integer
     */
    private int $testsPassed = 0;
    /**
     * Keeps track of the total number of tests failed 
     * @var integer
     */
    private int $testsFailed = 0;
    /**
     * Keeps track of the total number of tests skipped 
     * @var integer
     */
    private int $testsSkipped = 0;
    /**
     * Stores the name of the result set test suite 
     * @var string
     */
    private string $testSuite = "Unknown";
    /**
     * Creates a new result set object 
     * @param string $testSuite (optional) Name of the test suite
     */
    public function __construct(string $testSuite = "Unknown")
    {
        $this->testSuite = $testSuite;
        $this->testsExecuted = 0;
        $this->testsPassed = 0;
        $this->testsFailed = 0;
        $this->testsSkipped = 0;
    }
    /**
     * Gets (and optionally increments) the total number of tests executed 
     * @param boolean $incr (optional) is true, increments the count
     * @return integer The number of tests executed so far
     */
    public function TestsExecuted(bool $incr = false) : int 
    {
        if($incr == true) $this->testsExecuted++;
        return $this->testsExecuted;
    }
    /**
     * Gets (and optionally increments) the total number of tests passed
     * @param boolean $incr (optional) is true, increments the count
     * @return integer The number of tests passed so far
     */
    public function TestsPassed(bool $incr = false) : int 
    {
        if($incr == true) $this->testsPassed++;
        return $this->testsPassed;
    }
    /**
     * Gets (and optionally increments) the total number of tests failed
     * @param boolean $incr (optional) is true, increments the count
     * @return integer The number of tests failed so far
     */
    public function TestsFailed(bool $incr = false) : int 
    {
        if($incr == true) $this->testsFailed++;
        return $this->testsFailed;
    }
    /**
     * Gets (and optionally increments) the total number of tests skipped
     * @param boolean $incr (optional) is true, increments the count
     * @return integer The number of tests skipped so far
     */
    public function TestsSkipped(bool $incr = false) : int 
    {
        if($incr == true) $this->testsSkipped++;
        return $this->testsSkipped;
    }
    /**
     * Gets the test suite name of the current result set
     * @return string The name of the test suite
     */
    public function TestSuite() : string 
    {
        return $this->testSuite;
    }
}

/**
 * Provides test functions, all of which are static functions
 */
class UnitTests
{
    /**
     * Stores the test results, null if we have not been initialized.
     *
     * @var TestResults|null
     */
    private static ?TestResults $results = null;
    /**
     * Initializes a new UnitTest Object
     *
     * @param string $test_suite The name of this test suite 
     * @return void
     */
    public static function InitTestSuite(string $test_suite)
    {
        self::$results = new TestResults($test_suite);
    }
    /**
     * prints the test description to terminal
     * @param string $desc description of the unit test being executed
     * @return void
     */
    private static function reportTestTitle(string $desc)
    {
        if(self::$results == null) 
		throw new Exception("class has not been initialized");
        self::$results->TestsExecuted(true);
	    $fmt = "\e[96m [TEST]\e[33m (%d.\e[39m %s ";
        $m1 = str_pad(
            sprintf(
                $fmt, 
                self::$results->TestsExecuted(), 
                $desc
            ),
            65,
            " "
	    );
        printf("%s", $m1);
    }
    /**
     * prints a formatted message to the terminal that a test failed
     * @param mixed $v1 expected result
     * @param mixed $v2 actual result 
     * @return void
     */
    private static function reportTestFail($v1,$v2)
    {
        self::$results->TestsFailed(true);
	    $fmt = "\t\t\e[31m*** FAIL! *** expected: %s but got: %s\e[39m\n";
        printf($fmt,$v1,$v2);
        return FALSE;
    }
    /**
     * prints a formatted message to the terminal that a test passed 
     * @return void
     */
    private static function reportTestPass()
    {
        self::$results->TestsPassed(true);
        printf("\t\t\e[32m*** PASS ***\e[39m\n");
        return TRUE;
    }
    /**
     * Check that an expected float return value is correct 
     * @param float $v1 expected result
     * @param float $v2 actual result 
     * @param string|null $desc description of the unit test 
     * @return boolean true if passed, false otherwise 
     */
    public static function FloatEqual(
		float $v1, 
		float $v2, 
		string $desc = null
					) : bool 
    {
        $result = false;
        self::reportTestTitle($desc);
        $s1 = sprintf("%0.4f",$v1);
        $s2 = sprintf("%0.4f",$v2);
        if($s1 !== $s2) {
            $result = self::reportTestFail($s1,$s2);
        } else  {
            $result = self::reportTestPass();
        }
        return $result;
    }
    /**
     * Check that an expected int return value is correct 
     * @param int $v1 expected result
     * @param int $v2 actual result 
     * @param string|null $desc description of the unit test 
     * @return boolean true if passed, false otherwise 
     */
    public static function IntEqual(
			int $v1, 
			int $v2, 
			string $desc = null
					) : bool 
    {
        self::reportTestTitle($desc);
        $result = false;
        if($v1 !== $v2) {
            $result = self::reportTestFail($v1,$v2);
        } else  {
            $result = self::reportTestPass();
        }
        return $result;
    }
    /**
     * Check that an expected bool return value is correct 
     *
     * @param bool $v1 expected result
     * @param bool $v2 actual result 
     * @param string|null $desc description of the unit test 
     * @return boolean true if passed, false otherwise 
     */
    public static function BoolEqual(
			bool $v1, 
			bool $v2, 
			string $desc = null
					) : bool 
    {
        self::reportTestTitle($desc);
        $result = false;
        if($v1 !== $v2) {
            $result = self::reportTestFail($v1,$v2);
        } else  {
            $result = self::reportTestPass();
        }
        return $result;
    }
    /**
     * Check that an expected string return value is correct 
     *
     * @param string $v1 expected result
     * @param string $v2 actual result 
     * @param string|null $desc description of the unit test 
     * @return boolean true if passed, false otherwise 
     */
    public static function StringEqual(
			string $v1, 
			string $v2, 
			string $desc = null
					) : bool 
    {
        self::reportTestTitle($desc);
        $result = false;
        if($v1 !== $v2) {
            $result =  self::reportTestFail($v1,$v2);
        } else  {
            $result = self::reportTestPass();
        }
        return $result;
    }
    /**
     * Displays a formatted summary of test results.
     *
     * @return void
     */
    public static function ShowResults() 
    {
        if(self::$results == null) 
		throw new Exception("unintialized");
	    $fmt = "\e[34m" . str_repeat("*",76) . "\e[39m\n";
        printf($fmt);
        printf("\tTest Results\n");
	    $f = "\t\t%s:\t%s\n";
        printf($f,"Suite","\"" . self::$results->TestSuite() . "\"");
        printf($f,"Tests",self::$results->TestsExecuted());
	    $f = "\t\tPassed:\t\e[32m%d\e[39m\n";
        printf($f,self::$results->TestsPassed());
	    $f = "\t\tFailed:\t\e[31m%d\e[39m\n";
        printf($f, self::$results->TestsFailed());
        printf($fmt);
    }
}
?>
