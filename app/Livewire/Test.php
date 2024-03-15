<?php

namespace App\Livewire;

use App\Models\User;
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

        // $data = User::all();
        // foreach ($data as $d) {
        //     $rubah = User::find($d->id);
        //     $rubah->office_location =
        //         'https://maps.app.goo.gl/FU5Y65VWziBBwmWU8';
        //     $rubah->save();
        // }


        return view('livewire.test');
    }
}
