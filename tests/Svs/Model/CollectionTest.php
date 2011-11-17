<?php
    
class Svs_Model_CollectionTest extends Svs_Test 
{
	//-------------------------------------------------------------------------
	// - VARS
	
	//-------------------------------------------------------------------------
	// - PUBLIC
	
	/**
	 * @dataProvider provideCollection
	 */
	public function testForInterfaces($m)
	{
		$this->assertInstanceOf('Iterator', $m); 
		$this->assertInstanceOf('Countable', $m); 
		$this->assertInstanceOf('ArrayAccess', $m); 
	}
	
	/**
	 * @dataProvider provideCollection
	 */
	public function testCanAddToCollection($m)
	{
		$mEntity = $this->getMockForAbstractClass('Svs_Model_EntityAbstract', array(array('id' => 1)));
		$mEntity2 = $this->getMockForAbstractClass('Svs_Model_EntityAbstract', array(array('id' => 2)));
		
		$this->assertEquals(
			2, 
			$m->add($mEntity)
		  	  ->add($mEntity2, 'NamedIndex')
		  	  ->count()
		 );
		 
	}
	
	/**
	 * @dataProvider provideCollection
	 */
	public function testUnsetEntityByGivenEntity($m)
	{
		$mEntity = $this->getMockForAbstractClass(
			'Svs_Model_EntityAbstract', array(array('id' => 1))
		);
		$mEntity1 = $this->getMockForAbstractClass(
			'Svs_Model_EntityAbstract', array(array('id' => 2))
		);
		
		$m->add($mEntity);
		$m->add($mEntity1);
		$m->offsetUnset($mEntity);
		
		$this->assertNotContains($mEntity, $m->toArray());
		
	}	
	
	//-------------------------------------------------------------------------
	// - PROTECTED
	
	//-------------------------------------------------------------------------
	// - PROVIDER
	
	public function provideCollection()
	{
		return array(
			array($this->getMockForAbstractClass('Svs_Model_CollectionAbstract'))
		);
	}
	
}
