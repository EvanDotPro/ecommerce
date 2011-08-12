<?php
class Core_Model_AvailabilityTest extends PHPUnit_Framework_TestCase
{
    protected $_model;
    
    protected function setUp()
    {
        parent::setUp();
        $this->_model = new \Core\Model\Availability();
    }

    public function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testModelIsEmpty()
    {
        $this->assertInstanceOf('\Core\Model\Availability',$this->_model);
        $this->assertNull($this->_model->getDistributor());
        $this->assertNull($this->_model->getCost());
    }

    public function modelDataProvider()
    {
        return array (
            array (array (
                'distributor' => array (
                    'distributor_id' => 1,
                    'name'           => 'Company',
                ),
                'cost'        => 1.0,
            ))
        );
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectDataWithDistributorArray($data)
    {
        $this->_model->setDistributor($data['distributor'])
                     ->setCost($data['cost']);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectDataWithDistributorObject($data)
    {
        $this->_model->setDistributor(new \Core\Model\Distributor($data['distributor']))
                     ->setCost($data['cost']);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testModelThrowsInvalidArgumentExceptionForDistributor()
    {
        $this->_model->setDistributor('asdf');
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBePopulatedAtConstruct($data)
    {
        $model = new \Core\Model\Availability($data);
        $this->assertSame($model->toArray(), $data);
    }
}
