<?php

namespace App\Livewire\Navigation;

use Livewire\Component;

class Navbar extends Component
{
    public $activeLink = 'Beranda';

    public function setActiveLink($activeLink = 'Beranda')
    {
        $this->activeLink = $activeLink;
    }

    public function render()
    {
        return view('livewire.navigation.navbar');
    }
}
