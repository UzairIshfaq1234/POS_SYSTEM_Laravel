<?php

namespace App\View\Components\Formcomponents;

use Illuminate\View\Component;

class Adminformhead extends Component
{
    public $formroute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($formroute)
    {
        $this->formroute=$formroute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.formcomponents.adminformhead');
    }
}
