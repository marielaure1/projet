<?php
namespace Core\HTML;
class BootstrapForm extends Form{

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html){
        return "<div class='form-group mb-3 row'>{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [], $placeholder = null, $messageError = ""){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label class="form-label">' . $label . '</label>';
        if($type === 'textarea'){
            $input = '<textarea  rows="5" cols="33" name="' . $name . '" class="form-control" placeholder="'.$placeholder.'">' . $this->getValue($name) . '</textarea><p class="error">'.$messageError.'</p>';
        } else if($type === 'file'){
            $input = '<input type="' . $type . '" name="' . $name . '" placeholder="'.$placeholder.'" class="form-control"><p class="error">'.$messageError.'</p>';
        } else{
            $input = '<input type="' . $type . '" name="' . $name . '" placeholder="'.$placeholder.'" value="' . $this->getValue($name) . '" class="form-control"><p class="error">'.$messageError.'</p>';
        }
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options){
        $label = '<label class="form-label">' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function btnSubmit($class, $value){
        return $this->surround('<button type="submit" class="btn '.$class.'">'.$value.'</button>');
    }
}