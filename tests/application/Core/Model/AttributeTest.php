
<?php
class Core_Model_AttributeTest extends PHPUnit_Framework_TestCase
{
    protected $_model;
    
    protected function setUp()
    {
        parent::setUp();
        $this->_model = new \Core\Model\Attribute();
    }

    public function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testModelIsEmpty()
    {
        $this->assertInstanceOf('\Core\Model\Attribute',$this->_model);
        $this->assertNull($this->_model->getName());
        $this->assertNull($this->_model->getValue());
    }

    public function modelDataProvider()
    {
        return array (
            array (array (
                'name'    => 'color',
                'value'   => 'red',
            ))
        );
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectData($data)
    {
        $this->_model->setName($data['name'])
                     ->setValue($data['value']);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBePopulatedAtConstruct($data)
    {
        $model = new \Core\Model\Attribute($data);
        $this->assertSame($model->toArray(), $data);
    }
}
