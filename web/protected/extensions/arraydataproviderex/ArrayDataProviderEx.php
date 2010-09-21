<?php
/**
 * ArrayDataProviderEx implements a data provider based on ArrayModel.
 * 
 * Sorting and pagination are not supported
 *
 * ArrayDataProviderEx may be used in the following way:
 * <pre>
 *
 * $a = array(
 *    'key1' => 'value1',
 *    'key2' => 'value2',
 *    'key3' => 'value3',
 * );
 *
 * $dataProvider=new ArrayDataProviderEx($a, ArrayDataProviderEx::ARRAY_ASSOC);
 *
 * // .....
 *
 * // somewhere in view
 * $this->widget('zii.widgets.grid.CGridView', array(
 *     'id'=>'placeholders-values',
 * 	   'dataProvider'=>$dataProvider,
 * 	   'columns'=>array(
 *         'key',
 *         'value,
 *     ),
 * ));
 * </pre>
 *
 * Aabove code will produce next grid view
 * <table class="items">
 * <thead>
 *     <tr>
 *        <th id="placeholders-values_c0">key</th><th id="placeholders-values_c1">value</th>
 *     </tr>
 * </thead>
 *     <tbody>
 *         <tr class="odd"><td>key1</td><td>value1</td></tr>
 *         <tr class="even"><td>key2</td><td>value2</td></tr>
 *         <tr class="odd"><td>key3</td><td>value3</td></tr>
 *     </tbody>
 * </table>
 *
 * <br/><br/>
 * Another usage<br/>
 *
 * <pre>
 *
 * $a = array(
 *    array('color'=>red, 'model'=>'BMV Z5'),
 *    array('color'=>silver, 'model'=>'Audi A6'),
 *    array('color'=>black, 'model'=>'Audi A8'),
 * );
 *
 * $dataProvider=new ArrayDataProviderEx($a, ArrayDataProviderEx::ARRAY_ORDER);
 *
 * // .....
 *
 * // somewhere in view
 * $this->widget('zii.widgets.grid.CGridView', array(
 *     'id'=>'placeholders-values',
 * 	   'dataProvider'=>$dataProvider,
 * 	   'columns'=>array(
 *         'color',
 *         'model,
 *     ),
 * ));
 * </pre>
 *
 * And result
 * <table class="items">
 * <thead>
 *     <tr>
 *        <th id="placeholders-values_c0">color</th><th id="placeholders-values_c1">model</th>
 *     </tr>
 * </thead>
 *     <tbody>
 *         <tr class="odd"><td>red</td><td>BMW Z5</td></tr>
 *         <tr class="even"><td>silver</td><td>Audi A6</td></tr>
 *         <tr class="odd"><td>black</td><td>Audi A8</td></tr>
 *     </tbody>
 * </table>
 *
 * @author Alexandr Dorogikh (dorogikh.alexander@gmail.com)
 * @link http://creative-territory.net
 * @version 1.0
 */
class ArrayDataProviderEx extends CDataProvider {
    
    const ARRAY_ASSOC = 0;
    const ARRAY_ORDER = 1;

    private $_arrayType;

    /**
     * @var array[ArrayModel] $_array
     */
    private $_array = array();
    private $_keys = array();

    public $modelClass = 'ArrayModel';

	/**
	 * @var string the name of key attribute for {@link modelClass}. If not set,
	 * it means the primary key of the corresponding database table will be used.
	 */
	public $keyAttribute = null;

    /**
     *
     * @param array $array
     * @param integer $arrayType
     */
    public function __construct($array, $arrayType = self::ARRAY_ASSOC){
        if($array === array())
			throw new CException('Empty Array given.'); // use Yii::t
        
        if(($arrayType != self::ARRAY_ASSOC) && ($arrayType != self::ARRAY_ORDER)){
            throw new CException('Unknown array type'); // use Yii::t
        }

        $this->setId($this->modelClass);

        $a = array();
        if($arrayType == self::ARRAY_ASSOC){
            $this->_keys = array_keys($array);
            foreach($array as $key=>$value){
                $this->_array[] = new $this->modelClass(array('key'=>$key, 'value'=>$value));
            }
        }
        else{
            foreach($array as $value){
                $this->_array[] = new $this->modelClass($value);
            }
            if($this->keyAttribute !== null){
                foreach($this->_array as $am){
                    $this->_keys[] = $am[$this->keyAttribute];
                }
            }
            else{
                foreach($this->_array as $am){
                    $this->_keys[] = $am->getPrimaryKey();
                }
            }
        }
        
        $this->_arrayType = $arrayType;

    }

    protected function fetchData(){
        return $this->_array;
    }

    protected function fetchKeys(){
        return $this->_keys;
    }

    protected function calculateTotalItemCount(){
        return count($this->_array);
        
    }
}
