<?php 
use \Illuminate\Database\Eloquent\Model as Eloquent;


class BaseModel extends Eloquent 
{ 
	
	public function format($attribute, $type = 'number', $format = [0, '', '.'])
    {
        if($type == 'number')
            return number_format($this->attributes[$attribute], $format[0], $format[1], $format[2]);
        else if($type == 'date')
            return $this->attributes[$attribute]?Carbon\Carbon::CreateFromFormat($this->attributes[$attribute], is_array($format)?'Y-m-d H:i:s':$format ):null;
        else
            return ' format($attribute, $type = "number", $format = [0, "", "."]) ';
    }
    
}