<?php

namespace inc;

class HTMLGenerator
{
    /**
     * Generate HTML markup for a single invoice field.
     *
     * @param array $field An array containing field configuration options.
     *
     * @return void
     */
    public static function InvoiceFieldHTML(array $field ) : void
    {
        $field = (object)$field;
        $html = '<div class="form-field">';
        $html .= "<h5 class='field-title'> $field->label </h5>";
        $value = self::LoadConfig()['setting'][$field->name];
        switch ( $field->type ){
            case 'text':
                $html .= "<input type='$field->type' 
                            $field->required
                            name='$field->name' 
                            value='$value'
                            placeholder='$field->placeholder' 
                            $field->attributes>";
                break;
            case 'textarea':
                $html .= "<textarea name='$field->name' $field->required $field->attributes>$value</textarea>";
                break;
            case 'file':
                $html .= "<input type='$field->type' 
                            $field->required
                            name='$field->name' 
                            $field->attributes>";
                $html .= "<img class='field-file-preview' src='$value' >";
                break;
        }
        $html .= '</div>';

        echo $html;
    }
}