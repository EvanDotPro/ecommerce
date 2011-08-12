<?php
class Core_Model_ProductTest extends PHPUnit_Framework_TestCase
{
    protected $_model;
    
    protected function setUp()
    {
        parent::setUp();
        $this->_model = new \Core\Model\Product();
    }

    public function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testModelIsEmpty()
    {
        $this->assertInstanceOf('\Core\Model\Product',$this->_model);
        $this->assertNull($this->_model->getProductId());
        $this->assertNull($this->_model->getName());
        $this->assertNull($this->_model->getItemNumber());
        $this->assertNull($this->_model->getManufacturer());
        $array = $this->_model->getAttributes();
        $this->assertTrue(is_array($array) && count($array) === 0);
        $array = $this->_model->getUoms();
        $this->assertTrue(is_array($array) && count($array) === 0);
    }

    public function modelDataProvider()
    {
        return array (
            array (array (
                'product_id'   => 1,
                'manufacturer' => array (
                    'manufacturer_id' => 1,
                    'name'            => 'My Company',
                ),
                'name'         => 'My Product',
                'item_number'  => '123ABC',
                'attributes'   => array (
                    array (
                        'name'  => 'color',
                        'value' => 'red',
                    ),
                ),
                'uoms'        => array (
                    array (
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
                    ),
                ),
            ))
        );
    }


    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectDataWithArrays($data)
    {
        $this->_model->setProductId($data['product_id'])
                     ->setName($data['name'])
                     ->setItemNumber($data['item_number'])
                     ->setManufacturer($data['manufacturer'])
                     ->setAttributes($data['attributes'])
                     ->setUoms($data['uoms']);
        $manufacturer = $this->_model->getManufacturer();
        $this->assertInstanceOf('\Core\Model\Manufacturer', $manufacturer);
        $this->_model->setManufacturer($manufacturer);
        $manufacturer = $this->_model->getManufacturer();
        $this->assertInstanceOf('\Core\Model\Manufacturer', $manufacturer);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectDataWithObjects($data)
    {
        $this->_model->setProductId($data['product_id'])
                     ->setName($data['name'])
                     ->setItemNumber($data['item_number'])
                     ->setManufacturer(new \Core\Model\Manufacturer($data['manufacturer']))
                     ->addAttribute(new \Core\Model\Attribute($data['attributes'][0]))
                     ->addUom(new \Core\Model\Uom($data['uoms'][0]));
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testModelThrowsInvalidArgumentExceptionForUom()
    {
        $this->_model->addUom('asdf');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testModelThrowsInvalidArgumentExceptionForAttribute()
    {
        $this->_model->addAttribute('asdf');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testProductThrowsInvalidArgumentExceptionForManufacturer()
    {
        $this->_model->setManufacturer('asdf');
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBePopulatedAtConstruct($data)
    {
        $config = new \Zend\Config\Config($data);
        $model = new \Core\Model\Product($config);
        $this->assertSame($model->toArray(), $data);
    }
}
