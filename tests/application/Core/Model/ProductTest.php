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
            ))
        );
    }


    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectData($data)
    {
        $this->_model->setProductId($data['product_id'])
                     ->setName($data['name'])
                     ->setItemNumber($data['item_number'])
                     ->setManufacturer($data['manufacturer']);
        $manufacturer = $this->_model->getManufacturer();
        $this->assertInstanceOf('\Core\Model\Manufacturer', $manufacturer);
        $this->_model->setManufacturer($manufacturer);
        $manufacturer = $this->_model->getManufacturer();
        $this->assertInstanceOf('\Core\Model\Manufacturer', $manufacturer);
        $this->assertSame($this->_model->toArray(), $data);
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
