<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('custom_input_one'))
{
    function custom_input_one($name = '', $title = null, $object = null, $options = [], $extras = '', $parent_div_class = null) 
    {

        $input = '';
        $extra_attributes = "";
        if($options)
            foreach ($options as $key => $value) 
                $extra_attributes .= $key . ' = "' . $value . '" ';
        $field_name = null;
        if($object and is_object($object))
        {
            foreach (array_keys( $object->toArray() ) as $value)     
                if( strpos($name, $value) or $name == $value )
                {
                    $field_name = $value;
                    break;
                }
                else
                    $field_name = null;
            $field_value = ($field_name)?$object[$field_name]:'';
        }
        else
            if( $object and strpos( $object, "php echo e(") )
                $field_value = str_replace( "); ?>", " }}", str_replace("<?php echo e(", "{{ ", $object) );
            else
                $field_value = ($object)?$object:'';
        //$has_error = $errors->first($name, 'has-error') ? $errors->first($name, 'has-error') : $errors->first( str_replace( "]", "", str_replace("[", ".", $name) ), 'has-error');
        //$error_message = $errors->first($name, '<p class="text-danger">:message</p>')?$errors->first($name, '<p class="text-danger">:message</p>'):$errors->first( str_replace( "]", "", str_replace("[", ".", $name) ), '<p class="text-danger">:message</p>' );
        if( $parent_div_class )
            $input .= '<div class="' . $parent_div_class . '">';
                    $input .= 
                        '<div class="form-group ' . /*$has_error  .*/ '" >';
                    if($title)
                        $input .=
                                '<label for="' . $name . '">' . $title . '</label>';
                    $input .=
                            '<input placeholder="' . $title . '" name="' . $name . '" id="' . $name . '" ' . $extra_attributes . '"  value = "' /*. old($name, $field_value)*/ . '" class="form-control ' . $name . '" type="text"> ' /*. $error_message*/ . $extras;
                        $input .= 
                        '</div>';
        if( $parent_div_class )
            $input .= '</div>';
        return $input;

    }
}