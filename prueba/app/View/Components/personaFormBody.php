<?php

namespace App\View\Components;

use Illuminate\View\Component;

class personaFormBody extends Component
{
    private $persona;
    /**
     * Create a new component instance.
     * @param App\Models\persona $persona
     * @return void
     */
    public function __construct($persona = null)
    {
        $this -> persona = $persona;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params = [
            'persona' => $this->persona,
        ];
        return view('components.persona-form-body', $params);
    }
}
