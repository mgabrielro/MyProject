<?php 

require_once APPPATH. '/classes/controller/account.php';

/**
 * @group App
 * @group Login
 */
class Test_Controller_Account extends TestCase
{
	/**
	 * the setUp method will run before all other methods
	 */
	protected function setUp() {
        $this->user = new \Model_User();
    }

	function testSetNewUsername() {

        $set = $this->user->setUsername(1, 'gigi');

        $this->assertTrue($set);
    }


    function testSetNewEmail() {

        $set = $this->user->setEmail(1, 'mgabrielro@yahoo.com');

        $this->assertTrue($set);
    }


    function testCheckUserByEmailAndPassword() {

        $this->assertTrue($this->user->exists('mgabrielro@yahoo.com', '12345'));
    }


    

    /*public function test_TrueIsTrue()
	{
	    $foo = true;
	    $this->assertTrue($foo, '$foo is not true');
	}*/


    /*public function testFailingInclude()
    {
        include APPPATH.'views/footer.php';
    }*/


    /*public function testArraqyHasKey()
    {
        $this->assertArrayHasKey('foo', array('bar' => 'baz'));
    }*/


    /*public function testArrayContainsValue()
    {
        $this->assertContains(4, array(1, 2, 3));
    }*/



}