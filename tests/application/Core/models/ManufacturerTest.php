<?php
class Core_Model_ManufacturerTest extends PHPUnit_Framework_TestCase
{
    protected $_model;
    
    protected function setUp()
    {
        parent::setUp();
        $this->_model = new \Core\Model\Manufacturer();
    }

    public function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testModelIsEmpty()
    {
        $this->assertInstanceOf('\\Core\\Model\\Manufacturer',$this->_model);
        $this->assertNull($this->_model->getManufacturerId());
        $this->assertNull($this->_model->getName());
    }

    public function modelDataProvider()
    {
        return array (
            array (array (
                'manufacturer_id' => 1,
                'name'            => 'My Company',
            ))
        );
    }


    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectData($data)
    {
        $this->_model->setManufacturerId($data['manufacturer_id'])
                       ->setName($data['name']);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBePopulatedAtConstruct($data)
    {
        $model = new \Core\Model\Manufacturer($data);
        $this->assertSame($model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBeConvertedToString($data)
    {
        $model = new \Core\Model\Manufacturer($data);
        $this->assertSame((string) $model, $data['name']);
    }
}
