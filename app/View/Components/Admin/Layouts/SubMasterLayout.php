<?php

namespace App\View\Components\Admin\Layouts;

use Illuminate\View\Component;

class SubMasterLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.layouts.sub-master-layout');
    }
}
