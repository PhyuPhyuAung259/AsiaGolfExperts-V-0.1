<?php
namespace Themes\Findhouse\Template\Blocks;
class BaseBlock
{
    public $options = [];

    public function getName()
    {
        return '';
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function getOption($k, $default = false)
    {

        return $this->options[$k] ?? $default;
    }

    public function content($model = [])
    {

    }
}
