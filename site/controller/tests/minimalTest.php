<?php
// To run this test, in thecommand line type $ phpunit tests. It will run every test in tests folder.
// To use oiptions in phpunit-unit.xml (like nyan cat!) run $ phpunit --configuration phpunit-unit.xml tests
// The location of all tests is specified in phpunit-unit.xml so you can run from project root
// could not figure out how to run just one test suite, instead of everything in tests. You could delete the directory in phpunit-unit.xml and cd into tests and then run the file as in $ phpunit minimalTest.php



class GrumpyTest extends PHPUnit_Framework_TestCase {
	public function testTrueIsTrue(){
		$foo = true;
		$this->assertTrue($foo, "true is being asserted false"); // This message string is what shows when the test Fails
	}
}





class Baz {
	public $foo;
	public $bar;

	public function _construct(Foo $foo, Bar $bar){
		$this->foo = $foo;
		$this->bar = $bar;
	}

	public function processFoo(){
		return $this->foo->process();
	}

	public function mergeBar(){
		if($this->bar->getStatus() == 'merge-ready'){
			$this->bar->merge();
			return true;
		}
		return false;
	}
}

?>