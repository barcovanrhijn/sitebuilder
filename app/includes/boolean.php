<?php
//evaluates for boolean = 1 || !=1 => 0
function evalBoolean($value){
    if (is_bool($value )){
        if($value = 1){return 1;}
    }
    else{ 
        return 0;
    }
}
//set to replace evalBoolean for more readable code   
/**
 * yes
 * 
 * Checks for 0 or 1 in any data type in if statemens in a readable way
 * Accepts Integer, String, Double, Array, Object, Null
 * 
 * Usage: if(yes($testval)){true...}else{...false};
 * 
 * Suggested use includes c() or isset()
 * 
 * @todo Write a test for the Boolean section
 *
 * @param  mixed $value
 * @return int 0 or 1;
 */
function yes($value){
        $type = gettype($value);
        $result = 0; //if no option matches return 0;
    switch ($type) {
        case "boolean":
            if ($value === 1){$result = 1;}
            else if ($value === 0){$result = 0;}
            break;

        case "integer":
            if ($value === 1){$result = 1;}
            else if ($value === 0){$result = 0;};
            break;

        case "double":
            // Drop decimal places
            floor($value*100)/100;
            if ((int)$value == 1){$result = 1;}
            else if ((int)$value == 0){$result = 0;};
            break;

        case "string":
            if ($value === "1"){$result = 1;}
            else if ($value === "0"){$result = 0;};
            break;

        case "array":
            if ((int)$value == 1){$result = 1;}
            else if($value === "1"){$result = 1;}
            else if((int)$value == 0){$result = 0;}
            else if($value === "0"){$result = 0;}
            break;

        case "object":
            write_log('Boolean Settings with value:' . $value . 'is Type is Object');
            if (is_numeric){
                if ($value === 1){$result = 1;}
            }
            
            if ((int)$value == 1){$result = 1;}
            else if($value === "1"){$result = 1;}
            else if((int)$value == 0){$result = 0;}
            else if($value === "0"){$result = 0;}
            break;

        case "NULL":
            $result = 0;
            write_log('Boolean Settings with value:' . $value . 'is Type is Null');
            break;

        default:
            $result = 'Error';
            write_log('Boolean Settings with value:' . $value . 'has unknown variable assuming it is unset.');
            break;
    }

    return $result;
}