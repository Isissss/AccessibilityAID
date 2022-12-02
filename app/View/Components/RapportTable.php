<?php

namespace App\View\Components;

use App\Models\Challenge;
use Illuminate\View\Component;
use mysql_xdevapi\Collection;

class RapportTable extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $color;

    public $challenges;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color, $message, $challenges)
    {
        $this->color = $color;
        $this->message = $message;
        $this->challenges = $challenges;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.rapport-table');

    }
}
