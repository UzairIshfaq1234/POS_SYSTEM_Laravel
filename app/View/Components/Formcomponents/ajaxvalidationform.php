<?php

namespace App\View\Components\Formcomponents;

use Illuminate\View\Component;

class ajaxvalidationform extends Component
{
    public $ajaxroute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ajaxroute)
    {
        $this->ajaxroute = $ajaxroute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.formcomponents.ajaxvalidationform');
    }
}
