<?php
class Core_Model_UomTest extends PHPUnit_Framework_TestCase
{
    protected $_model;
    
    protected function setUp()
    {
        parent::setUp();
        $this->_model = new \Core\Model\Uom();
    }

    public function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testModelIsEmpty()
    {
        $this->assertInstanceOf('\Core\Model\Uom',$this->_model);
        $this->assertNull($this->_model->getUomCode());
        $this->assertNull($this->_model->getDescription());
        $this->assertNull($this->_model->getQuantity());
        $this->assertNull($this->_model->getPrice());
        $array = $this->_model->getAvailability();
        $this->assertTrue(is_array($array) && count($array) === 0);
    }

    public function modelDataProvider()
    {
        return array (
            array (array (
                'uom_code'    => 'EA',
                'description' => 'Each',
                'quantity'    => 1,
                'price'       => 1,
                'availability'=> array (
                    array (
                        'distributor' => array (
                            'distributor_id' => 1,
                            'name'           => 'Company',
                        ),
                        'cost'        => 1.0,
                    ),
                ),
                'enabled'      => true,
            ))
        );
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectDataWithAvailabilityArray($data)
    {
        $this->_model->setUomCode($data['uom_code'])
                     ->setDescription($data['description'])
                     ->setQuantity($data['quantity'])
                     ->setPrice($data['price'])
                     ->setAvailability($data['availability'])
                     ->setEnabled($data['enabled']);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectDataWithAvailabilityModel($data)
    {
        $this->_model->setUomCode($data['uom_code'])
                     ->setDescription($data['description'])
                     ->setQuantity($data['quantity'])
                     ->setPrice($data['price'])
                     ->addAvailability(new \Core\Model\Availability($data['availability'][0]))
                     ->setEnabled($data['enabled']);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testModelThrowsInvalidArgumentExceptionForAvailability()
    {
        $this->_model->setAvailability(array('asdf'));
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBePopulatedAtConstruct($data)
    {
        $model = new \Core\Model\Uom($data);
        $this->assertSame($model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelConvenienceMethods($data)
    {
        $model = new \Core\Model\Uom($data);
        $model->disable();
        $this->assertFalse($model->getEnabled());
        $model->enable();
        $this->assertTrue($model->getEnabled());
        $this->assertSame($model->toArray(), $data);
    }
}

