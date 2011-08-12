<?php
class Core_Model_DistributorTest extends PHPUnit_Framework_TestCase
{
    protected $_model;
    
    protected function setUp()
    {
        parent::setUp();
        $this->_model = new \Core\Model\Distributor();
    }

    public function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testModelIsEmpty()
    {
        $this->assertInstanceOf('\Core\Model\Distributor',$this->_model);
        $this->assertNull($this->_model->getDistributorId());
        $this->assertNull($this->_model->getName());
    }

    public function modelDataProvider()
    {
        return array (
            array (array (
                'distributor_id' => 1,
                'name'           => 'My Company',
            ))
        );
    }


    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectData($data)
    {
        $this->_model->setDistributorId($data['distributor_id'])
                       ->setName($data['name']);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBePopulatedAtConstruct($data)
    {
        $model = new \Core\Model\Distributor($data);
        $this->assertSame($model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBeConvertedToString($data)
    {
        $model = new \Core\Model\Distributor($data);
        $this->assertSame((string) $model, $data['name']);
    }
}
