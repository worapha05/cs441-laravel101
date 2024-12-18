<?php

namespace App\View\Components\Songs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Track extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $song
    )
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.songs.track');
    }
}
