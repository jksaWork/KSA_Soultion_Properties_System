<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AreaChilds extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public  $title, $childs, $route;
    public function __construct($title, $childs, $route)
    {
        $this->title = $title;
        $this->childs = $childs;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.area-childs');
    }
}
