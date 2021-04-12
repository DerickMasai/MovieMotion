<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StoryCard extends Component
{
    public $actor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($actor)
    {
        $this->actor = $actor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.story-card');
    }
}
