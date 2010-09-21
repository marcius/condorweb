<?php
/**
 * This class implements all methods needed for accessing simple array,
 * This class is the base class for classes representing array data.
 *
 * @author Alexandr Dorogikh (dorogikh.alexander@gmail.com)
 * @link http://creative-territory.net
 * @version 1.0
 */
class ArrayModel extends CModel {
    private $_rawArray;

    private $_attributeNames = array();
    private $_attributeLabels = array();

    private $_firstKeyValue;

    private $_config = array(
        'getException' => false,
        'setException' => true,
        'defaultGetValue' => null,
    );

    public function __construct($array, $config = array()) {
        $this->_rawArray = $array;
        $this->_firstKeyValue = key($array);
        $this->attributeNames();
        $this->attributeLabels();
        $this->makeConfig($config);
    }

    public function getIterator() {
        return new CMapIterator($this->_rawArray);
    }

    /**
     * @param offset
     */
    public function offsetExists ($offset) {
        return isset($this->_rawArray[$offset]);
    }

    /**
     * @param offset
     */
    public function offsetGet ($offset) {
        return $this->_array($offset);
    }

    /**
     * @param offset
     * @param value
     */
    public function offsetSet ($offset, $value) {
        $this->_rawArray[$offset] = $value;
    }

    /**
     * @param offset
     */
    public function offsetUnset ($offset) {
        unset($this->_rawArray[$offset]);
    }

    public function attributeNames() {
        if(empty($this->_attributeNames))
            $this->_attributeNames = array_keys($this->_rawArray);
        return $this->_attributeNames;
    }

    public function attributeLabels() {
        if(empty($this->_attributeLabels)) {
            $attributeNames = $this->attributeNames();
            foreach($attributeNames as $name) {
                $this->_attributeLabels[$name]=$this->generateAttributeLabel($name);
            }
        }
        return $this->_attributeLabels;
    }

    public function setAttributeLabels($attributeLabels) {
        if(!empty($attributeLabels))
            $this->_attributeLabels = $attributeLabels;
    }

    public function getAttributes($names = null) {
        $values=$this->_rawArray;

        if(is_array($names)) {
            $values2=array();
            foreach($names as $name)
                $values2[$name]=isset($values[$name]) ? $values[$name] : null;
            return $values2;
        }
        else
            return $values;
    }

    public function setRawArray($array) {
        $this->_rawArray = $array;
        $this->attributeNames();
        $this->attributeLabels();
    }

    public function getRawArray() {
        return $this->_rawArray;
    }

    public function __set($name, $value) {
        try {
            parent::__set($name, $value);
        }
        catch(CException $e) {
            if(!isset($this->_rawArray[$name]) && $this->_config['setException'])
                throw new CException(Yii::t('yii','Property "{class}.{property}" is not defined.',
                array('{class}'=>get_class($this), '{property}'=>$name)));

            $this->_rawArray[$name] = $value;
        }
    }

    public function __get($name) {
        try {
            return parent::__get($name);
        }
        catch(CException $e) {
            if(isset($this->_rawArray[$name]))
                return $this->_rawArray[$name];
            else {
                if($this->_config['getException'])
                    throw new CException(Yii::t('yii','Property "{class}.{property}" is not defined.',
                    array('{class}'=>get_class($this), '{property}'=>$name)));
                return $this->_config['defaultGetValue'];
            }
        }
    }

    private function makeConfig($config) {
        $this->_config = array_merge($this->_config, $config);
    }

    public function getPrimaryKey() {
        return $this->_firstKeyValue;
    }
}
