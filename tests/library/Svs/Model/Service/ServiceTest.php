<?php
    
class Svs_Model_Service_ServiceTest	extends Svs_Test 
{
	//-------------------------------------------------------------------------
	// - VARS
	
	private $_service;
	private $_mMapper;
			
	//-------------------------------------------------------------------------
	// - PUBLIC
	
	protected function setUp()
	{
		$this->_service = $this->getMockForAbstractClass(
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
		$service = $this->_service;
		
		$service->setMapper($mapper);
		$retrievedMapper = $service->getMapper();
		
		$this->assertInstanceOf(
			'Svs_Model_DataMapper_Abstract', $retrievedMapper
		); 
	}
	
	/**
	 * will fail because there is a class_exists check in the getter
	 * to prevent calls to an inexistend mapper
	 */
	public function testLazyLoadMapperWillFail()
	{
		$service = $this->_service;
		// stub return type
		$service->expects($this->any())
				->method('getMapper')
				->will($this->returnValue('Does_Model_DataMapper_NotExist'));
		
		try {	
			$mapper = $service->getMapper('Does', 'NotExist');
			
		} catch(Svs_Model_Exception $e){
			$this->assertContains('does not exist', $e->getMessage());
		}
	}
	
	public function testHasForm()
	{
		$service = $this->_service;
		$service->setForm(new Zend_Form());
		$form = $service->getForm();
		
		$this->assertInstanceOf('Zend_Form', $form);
		
	}	
	
	//-------------------------------------------------------------------------
	// - PRIVATE

	
}
