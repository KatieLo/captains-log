<?php 

//namespace controller\tests;

use controller\URL;

class URLTest extends PHPUnit_Framework_TestCase {

     public function testSluggifyReturnsSluggifiedString(){
     	$originalString = 'This string will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL(); // instantiate an object of the URL class. !!phpunit can't find the class 

        $result = $url->sluggify($originalString);
        $this->assertEquals($expectedResult, $result); // assert that result equals expected result
     }
}

?>