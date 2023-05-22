<?php

namespace App\View\Components;

use Illuminate\View\Component;

class showUnit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $RealstateUnits, $realstate;
    public function __construct($realstateunits, $realstate)
    {
        $this->realstate = $realstate;
        $this->RealstateUnits = $realstateunits;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show-unit');
    }
}
