<?php

namespace CMS;

class Form
{
    public function open($action, array $attrs = [])
    {
        return "<form action=\"$action\"{$this->attributes($attrs)}>";
    }

    public function close(array $attrs = [])
    {
        return '</form>';
    }

    public function text($label, $value, array $attrs = [])
    {
        $id = $this->get('id', $attrs);

        empty($value) or $attrs['value'] = $value;

        return <<<TEXT
<div class="control-group">
  <label class="control-label" for="$id">$label</label>
  <div class="controls">
    <input type="text"{$this->attributes($attrs)}>
  </div>
</div>
TEXT;
    }

    public function textarea($label, $value, array $attrs = [])
    {
        $id = $this->get('id', $attrs);

        return <<<TEXT
<div class="control-group">
  <label class="control-label" for="$id">$label</label>
  <div class="controls">
    <textarea{$this->attributes($attrs)}>$value</textarea>
  </div>
</div>
TEXT;
    }

    public function checkboxes(array $checkboxes)
    {
        $out = '
<div class="control-group">
  <div class="controls">';

        foreach ($checkboxes as $checkbox) {
            $label = $this->once('label', $checkbox);
            $out .= '
    <label class="checkbox">
      <input type="checkbox"'.$this->attributes($checkbox).'>
      '.$label.'
    </label>';
        }

        $out .= '
  </div>
</div>';

        return $out;
    }

    public function radios(array $radios)
    {
        $out = '
<div class="control-group">
  <div class="controls">';

        foreach ($radios as $radio) {
            $label = $this->once('label', $radio);
            $out .= '
    <label class="radio">
      <input type="radio"'.$this->attributes($radio).'>
      '.$label.'
    </label>';
        }

        $out .= '
  </div>
</div>';

        return $out;
    }

    public function actions()
    {
        return <<<TEXT
<div class="form-actions">
  <button type="submit" class="btn btn-primary">Save changes</button>
  <button type="button" class="btn">Cancel</button>
</div>
TEXT;
    }




    private function get($attr, array $attrs)
    {
        return isset($attrs[$attr]) ? $attrs[$attr] : null;
    }

    private function once($attr, array &$attrs)
    {
        $value = null;
        if (isset($attrs[$attr])) {
            $value = $attrs[$attr];
            unset($attrs[$attr]);
        }

        return $value;
    }

    private function attributes(array $attrs)
    {
        $attrString = '';
        foreach ($attrs as $attr => $value) {
            if (is_bool($value)) {
                $value and $attrString .= " $attr";
            } else {
                $attrString .= " {$attr}=\"{$value}\"";
            }
        }

        return $attrString;
    }
}