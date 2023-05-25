<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select2Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name, $value, $option, $class, $disabled;
    public function __construct($name, $class, $value = null, $option = null, $disabled = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->option = $option;
        $this->class = $class;
        $this->disabled = $disabled;
        // dd($disabled);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select2-input');
    }
}
