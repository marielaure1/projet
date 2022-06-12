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
    public function input($name, $label, $options = [], $placeholder = null){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label class="col-sm-2 col-form-label">' . $label . '</label>';
        if($type === 'textarea'){
            $input = '<div class="col-sm-5">
                          <textarea name="' . $name . '" class="form-control"  placeholder="'.$placeholder.'">' . $this->getValue($name) . '</textarea>
                          </div>';
        } else{
            $input = '<div class="col-sm-5">
                          <input type="' . $type . '" name="' . $name . '" placeholder="'.$placeholder.'" value="' . $this->getValue($name) . '" class="form-control">
                     </div>';
        }
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options){
        $label = '<label class="col-sm-2 col-form-label">' . $label . '</label>';
        $input = '<div class="col-sm-5"> <select class="form-control" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select> </div>';
        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function submit(){
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}