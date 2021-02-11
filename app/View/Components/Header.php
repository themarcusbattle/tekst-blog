<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $title;

    public $frsh;

    public $topics;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $frsh, $topics)
    {
        $this->title = $title;
        $this->frsh = $frsh;
        $this->topics = $topics;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
