<?php

namespace App\Livewire;

use Livewire\Component;

class Test extends Component
{
    public function split_text($text)
    {
        $data = explode('/br', $text);
        return $data;
    }
    public function render()
    {
        $data = "saya adalah Anton /br saya adalag seorang web developer /br saya udah professional dan sukses dan kaya";
        $data = $this->split_text($data);
        dd(count($data));


        return view('livewire.test');
    }
}
