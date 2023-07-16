<?php

namespace App\View\Components\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageGrid extends Component
{
    /**
     * Create a new component instance.
     */
    public $cols;

    public function __construct($cols)
    {
        //
        $this->cols = $cols;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pages.page-grid');
    }
}
