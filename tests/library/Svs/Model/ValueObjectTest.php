<?php
    
class Svs_Model_ValueObjectTest extends Svs_Test 
{
	//-------------------------------------------------------------------------
	// - VARS
	
	//-------------------------------------------------------------------------
	// - PUBLIC
	
	public function setUp()
	{
		parent::setUp();
	}
	
	//-------------------------------------------------------------------------
	// - PUBLIC
	
	/**
     * @expectedException        Svs_Model_Exception
     * @expectedExceptionMessage VO has invalid state
     */
	public function testVOIsInvalid()
	{
		$o = new Svs_Model_ValueObject(array());
		$value = $o->get('name');
	}
	
	public function testHasAttrib()
	{
		$o = new Svs_Model_ValueObject(array('name' => 'TestName'));
		$this->assertEquals('TestName', $o->get('name'));
	}
	
	public function testVoEqualsNotVo()
	{
		$o 	= new Svs_Model_ValueObject(array('name' => 'John'));
		$o1 = new Svs_Model_ValueObject(array('name' => 'Jane'));
		
		$this->assertFalse($o->equals($o1));
	}
	
	public function testVoEqualsVo()
	{
		$o 	= new Svs_Model_ValueObject(array('name' => 'John'));
		$o1 = new Svs_Model_ValueObject(array('name' => 'John'));
		
		$this->assertTrue($o->equals($o1));
	}
	
	public function testVoToString()
	{
		$o 	 = new Svs_Model_ValueObject(array('name' => 'John'));
		$str = '' . $o;
		$this->assertEquals('name: John', $str);
	}
	
	//-------------------------------------------------------------------------
	// - PROVIDER
	
	
	
}
