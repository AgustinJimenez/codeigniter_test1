<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('custom_input_one'))
{
    function custom_input_one($name = '', $title = null, $object = null, $parent_div_class = '', $options = [], $extras = '') 
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
                            '<input placeholder="' . $title . '" name="' . $name . '" id="' . $name . '" ' . $extra_attributes . '"  value = "' . $field_value/*. old($name, $field_value)*/ . '" class="form-control ' . $name . '" type="text"> ' /*. $error_message*/ . $extras;
                        $input .= 
                        '</div>';
        if( $parent_div_class )
            $input .= '</div>';
        return $input;

    }
}

if ( ! function_exists('custom_select_one'))
{
    function custom_select_one($name = '', $title = null, $options = [], $object_or_selected = null, $parent_div_class = null, $extra_attributes = [], $extras = '') 
    {
        if(!is_array($options))
            dd('array required for select');

        $field_name = null;
        if($object_or_selected and is_object($object_or_selected))
        {
            foreach (array_keys( $object_or_selected->toArray() ) as $value)     
                if( strpos($name, $value) or $name == $value )
                {
                    $field_name = $value;
                    break;
                }
                else
                    $field_name = null;
            $field_value = ($field_name)?$object_or_selected[$field_name]:'';
        }
        else
            if( $object_or_selected and strpos( $object_or_selected, "php echo e(") )
                $field_value = str_replace( "); ?>", " }}", str_replace("<?php echo e(", "{{ ", $object_or_selected) );
            else
                $field_value = ($object_or_selected)?$object_or_selected:'';



        $attrs_to_add = '';
        if( count($extra_attributes) )
            foreach ($extra_attributes as $attr => $value) 
                $attrs_to_add .= $attr . ' = "' . $value . '" ';


        $input = '';

        if( $parent_div_class )
            $input .= '<div class="' . $parent_div_class . '">';
        else
            $input .= '<div>';

        $input .= '<div class="form-group dropdown">';

        if( $title )
            $input .= '<label for="' . $name . '">' . $title . ' </label>';

        $input .= '<select class="form-control" id="' . $name . '" name="' . $name . '" ' . $attrs_to_add . '>';
        foreach ($options as $key => $value) 
            if( $key == $field_value )
            {
                $input .= '<option value="' . $key . '" selected>' . $value . '</option>';
                $field_value = null;
            }
            else
                $input .= '<option value="' . $key . '">' . $value . '</option>';
        $input .= '</select>' . $extras;

    $input .= '</div></div>';
    return $input;
    }
}

