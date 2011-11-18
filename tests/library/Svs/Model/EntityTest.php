<?php


class Svs_Model_EntityTest extends Svs_Test
{
	
	//-------------------------------------------------------------------------
	// - VARS
	
	private $_entity;
	
	//-------------------------------------------------------------------------
	// - INIT
	
	/**
	 * inits the vars used throughout the test 
	 */
	protected function setUp()
	{
		parent::setUp();
		$this->_entity = $this->getMockForAbstractClass(
			'Svs_Model_EntityAbstract'
		);			
	}
	
	//-------------------------------------------------------------------------
	// - TESTS
	
	/**
	 * @dataProvider provideEmptyEntity
	 */
	public function testConstructionWithoutOptions($e)
	{
		$this->assertNull($e->id);
	}
	
	/**
	 * @dataProvider provideEmptyEntity
	 */
	public function testHasID($e)
	{
		$e->setId(1);
		$this->assertEquals(1, $e->getId());
	}
	
	public function testConstructionWithArrayAsOptions()
	{
		$e = $this->getMockForAbstractClass(
			'Svs_Model_EntityAbstract',
			array(array('id' => 1)) 
		);
		
		$this->assertNotNull($e->id);
	}
		
	/**
	 * @dataProvider provideFields
	 */
	public function testSetFields($options)
	{
		$this->_entity->setFields($options);
		$this->assertEquals(1, $this->_entity->id);
		$this->assertEquals('Test', $this->_entity->name);
	}
	
	/**
	 * @dataProvider provideFields 
	 */
	public function testGetFieldVerbose($options)
	{
		$this->_entity->setFields($options);
		$this->assertEquals(1, $this->_entity->get('id'));
	}
	
	public function testGetFieldVerboseWithDefaultValueGiven()
	{
		$this->assertEquals('default', $this->_entity->get('name', 'default'));
	}
	
	/**
	 * @dataProvider provideFields 
	 */
	public function testGetFieldVerboseDefaultWithDefinedField($options)
	{
		$this->_entity->setFields($options);
		$this->assertEquals('Test', $this->_entity->get('name', 'default'));
	}
	
	/**
	 * @dataProvider provideFields
	 */
	public function testIssetId($options)
	{
		$this->_entity->setFields($options);
		$this->assertTrue(isset($this->_entity->id));
	}
	
	/**
	 * @dataProvider provideFields
	 */
	public function testIdCantChange($o)
	{
		$this->_entity->setFields($o)
			->setId(2);
		
		$this->assertFalse($this->_entity->id === 2);
		$this->assertEquals(1, $this->_entity->id);
	}
	
	public function testUndefinedId()
	{
		$this->assertNull($this->_entity->id);
	}
	
	/**
	 * @dataProvider provideEmptyEntity
	 */
	public function testObjToString($e)
	{
		$e->setFields(array('name' => 'test'));
		$str = '' . $e;
		$this->assertEquals('name: test', $str);
	}
	
	/**
	 * @dataProvider provideEmptyEntity
	 */
	public function testEntityNotEqaulsEntity($e)
	{
		$e1 = $e;
		$e->setId(1);
		$e1->setId(1);
		$this->assertFalse($e !== $e1);
	}
	
	/**
	 * @dataProvider provideEmptyEntity
	 */
	public function testDeleteField($e)
	{
		$e->setFields(
			array(
				'id' => 1,
				'name' => 'TestName',
		));
		unset($e->name);
		$this->assertNull($e->name);
	}
	
	//-------------------------------------------------------------------------
	// - PROVIDER
	
	public function provideFields()
	{
		return array(
			array(
				array(
					'id' => 1,
					'name' => 'Test',
				)
			)
		);		
	}
	
	public function provideEmptyEntity()
	{
		return array(
			array(
				$this->getMockForAbstractClass('Svs_Model_EntityAbstract')
			),
		);
	}
	
}
