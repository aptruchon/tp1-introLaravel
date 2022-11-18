<?php

namespace App\View\Components;

use Illuminate\View\Component;

class equipe extends Component
{
    public $member;

    public function __construct($member)
    {
        $this->member = $member;
        /* dd($this->member); */
    }

    public function render()
    {
        return view('components.equipe');
    }
}