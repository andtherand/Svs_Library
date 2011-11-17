<?php

class Svs_Model_DataMapperTest extends Svs_Test
{
	
	private $_mock;
	
	public function setUp()
	{
		$this->_mock = $this->getMockForAbstractClass(
			'Svs_Model_DataMapperAbstract'
		);
		
		parent::setUp(); 
	}
	
	public function testSufficeInterface()
	{
		$m = $this->_mock;		
		$this->assertInstanceOf('Svs_Model_DataMapperInterface', $m);
	}
		
	public function testEntityTableIsDefinedAndAString()
	{
		$m = $this->_mock;
		$this->assertEquals(
			'Test', 
			$m->setEntityTableName('Test')->getEntityTableName()
		);
	}
	
	public function testEntityTableCantBeInvalid()
	{
		$m = $this->_mock;
				
		try {
			$m->setEntityTableName(array());
			
		} catch (Svs_Model_Exception $e) {
			$this->assertContains('given is invalid', $e->getMessage());	
		}
	}

	public function testValidEntityClass()
	{
		$m = $this->_mock;
		$entity = $m->setEntityClass('Svs_Model_EntityAbstract')
					->getEntityClass();
		$this->assertEquals('Svs_Model_EntityAbstract', $entity);
	}
	
	public function testEntityClassCantBeInvalid()
	{
		$m = $this->_mock;
		
		try {
			$entity = $m->setEntityClass('NotExisting')->getEntityClass();
			
		} catch (Svs_Model_Exception $e) {
			$this->assertContains('does not exist', $e->getMessage());
		}
	}
	
	/*
	 * TODO: FIX the test 
	 * 
	public function testHasCollection()
	{
		$mCollection = $this->getMockForAbstractClass(
			'Svs_Model_CollectionAbstract'
		);
		
		$m = $this->_mock;
		$m->expects($this->any())
		  ->method('getCollection')
		  ->will($this->returnValue($mCollection));
		  
		$this->assertInstanceOf(
			'Svs_Model_CollectionAbstract', 
			$m->getCollection()
		);	
		
	}
	*/
}