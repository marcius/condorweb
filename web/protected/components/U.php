<?php

class U {

    public static function setUserValue($name, $value, $expire = false) {
        $cookie = new CHttpCookie($name, $value);
        $cookie->expire = time() + ($expire ? $expire : 60 * 60 * 24 * 180);
        Yii::app()->request->cookies[$name] = $cookie;
    }

    public static function getUserValue($name) {
        return Yii::app()->request->cookies[$name];
    }

    public static function filled($string) {
        $string = trim($string);
        if (is_numeric($string))
            return TRUE;
        return!empty($string);
    }

    public static function q($param) {
        return Yii::app()->request->getParam($param);
    }

    public static function getLimitClause($pagestart, $rowsperpage) {
        if (U::filled($pagestart) && U::filled($rowsperpage)) {
            $rowstart = $pagestart * $rowsperpage - $rowsperpage;
            return " LIMIT " . $rowstart . ", " . $rowsperpage;
        } else {
            return "";
        }
    }

    public static function getOrderBy($fieldname, $direction) {
        if (!empty($fieldname) && !empty($direction)) {
            return " ORDER BY " . $fieldname . " " . $direction;
        } else {
            return "";
        }
    }

    public static function getJsonHeader($stmt, $pagestart, $rowsperpage) {
        $response->records = Yii::app()->db->createCommand("SELECT count(*) from (" . $stmt . ") count")->queryScalar();

        if ($response->records > 0) {
            $response->total = ceil($response->records / $rowsperpage);
        } else {
            $response->total = 0;
        }
        $response->page = $pagestart;
        return $response;
    }

    public static function addwhere($field, $oper, $value, $type = "number", $and_or = "and") {
        if (empty($value))
            return "";
        if ($oper == "is") {
            if ($value == "notnull")
                $fvalue = "not null";
            elseif ($value == "null")
                $fvalue = "null";
            else
                return "";
        } elseif ($oper == "case") {
            $fvalue = $field[$value];
            $field = "";
            $oper = "";
        } elseif ($type == "boolean" && $value == "true") {
            $fvalue = "";
            $oper = "";
        } elseif ($type == "string" && $oper == "like") {
            $fvalue = "'%" . $value . "%'";
        } elseif ($type == "string") {
            $fvalue = "'" . $value . "'";
        } elseif ($type == "number") {
            $fvalue = $value;
        } elseif ($type == "date") {
            $fvalue = "'" . $value . "'";
        } else
            return "";
        return " " . $and_or . " " . $field . " " . $oper . " " . $fvalue;
    }

    public static function cat($array, $sep = "_") {
        $ret = "";
        foreach ($array as $elem) {
            if (!empty($elem))
                $ret .= $sep . $elem;
        }
        return substr($ret, strlen($sep));
    }

    public static function num_d2($value) {
        return Yii::app()->numberFormatter->format("#,##0.00", $value);
    }

    public static function num_i($value) {
        return Yii::app()->numberFormatter->format("#,##0", $value);
    }

}

?>
