<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OwnerRealstate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $realstates;
    public function __construct($realstates)
    {
        $this->realstates = $realstates;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.owner-realstate');
    }
}