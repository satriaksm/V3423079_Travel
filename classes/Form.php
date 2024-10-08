<?php
class Form
{
    private $action;
    private $method;

    public function __construct($action, $method = "POST")
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function openForm()
    {
        return "<form action='{$this->action}' method='{$this->method}' enctype='multipart/form-data'>";
    }

    public function closeForm()
    {
        return "</form>";
    }

    public function inputText($name, $label, $value = '')
    {
        return "
        <label for='{$name}'>{$label}:</label>
        <input type='text' name='{$name}' id='{$name}' value='{$value}' required><br>";
    }
    public function inputPassword($name, $label, $value = '')
    {
        return "
        <label for='{$name}'>{$label}:</label>
        <input type='password' name='{$name}' id='{$name}' required><br>";
    }

    public function inputNumber($name, $label, $value = '')
    {
        return "
        <label for='{$name}'>{$label}:</label>
        <input type='number' name='{$name}' id='{$name}' value='{$value}' required><br>";
    }

    public function inputTextarea($name, $label, $value = '')
    {
        return "
        <label for='{$name}'>{$label}:</label>
        <textarea name='{$name}' id='{$name}' required>{$value}</textarea><br>";
    }

    public function inputFile($name, $label)
    {
        return "
        <label for='{$name}'>{$label}:</label>
        <input type='file' name='{$name}' id='{$name}' accept='image/*' required><br>";
    }
    public function inputDropdown($name, $label, $options) {
        $dropdown = "<label>{$label}</label><select name='{$name}' required>";
        foreach ($options as $value => $text) {
            $dropdown .= "<option value='{$value}'>{$text}</option>";
        }
        $dropdown .= "</select><br>";
        return $dropdown;
    }

    public function inputRadio($name, $label, $options) {
        $radio = "<label>{$label}</label><br>";
        foreach ($options as $value => $text) {
            $radio .= "<input type='radio' name='{$name}' value='{$value}' required>{$text}<br>";
        }
        return $radio;
    }

    public function submitButton($value)
    {
        return "<button type='submit'>{$value}</button>";
    }
}
?>
