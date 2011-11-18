<?php
    
class Svs_Model_Service_ServiceTest	extends Svs_Test 
{
	//-------------------------------------------------------------------------
	// - VARS
	
	private $_mock;
	private $_mMapper;
			
	//-------------------------------------------------------------------------
	// - PUBLIC
	
	public function setUp()
	{
		$this->_mock = $this->getMockForAbstractClass(
			'Svs_Model_Service_Abstract'		
		);
		
		$this->_mMapper = $this->getMockForAbstractClass(
			'Svs_Model_DataMapper_Abstract'
		);
	}
	
	//-------------------------------------------------------------------------
	// - PROTECTED
	
	public function testCanSetAndGetMapper()
	{
		$mapper = $this->_mMapper;
		$service = $this->_mock;
		
		$service->setMapper($mapper);
		$retrievedMapper = $service->getMapper();
		
		$this->assertInstanceOf(
			'Svs_Model_DataMapper_Abstract', $retrievedMapper
		); 
	}
	
	//-------------------------------------------------------------------------
	// - PRIVATE
	
}
