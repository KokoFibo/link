<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\Component;

class UpdateData extends Component
{
    use WithFileUploads;
    public $is_add, $is_edit, $id;
    public $name, $title, $email, $kode_agent, $mobile, $whatsapp;
    public $instagram, $facebook, $tiktok, $youtube, $photo, $description, $clients, $claims, $teams, $real_code, $code;
    public $office, $address_1, $address_2, $address_3, $address_4;
    public $office_location;
    public $office_location_default = 'https://maps.app.goo.gl/FU5Y65VWziBBwmWU8';

    public function default_location()
    {
        $this->office_location = $this->office_location_default;
    }


    public function back()
    {
        $this->redirect('/dashboard');
    }

    protected $rules = [
        'name' => 'required',
        'title' => 'nullable',
        'email' => 'required',
        'kode_agent' => 'nullable|numeric',
        'description' => 'nullable',
        'clients' => 'nullable',
        'claims' => 'nullable',
        'teams' => 'nullable',
        'mobile' => 'nullable',
        'whatsapp' => 'nullable',
        'instagram' => 'nullable',
        'facebook' => 'nullable',
        'tiktok' => 'nullable',
        'youtube' => 'nullable',
        'office' => 'nullable|max:25',
        'address_1' => 'nullable|max:30',
        'address_2' => 'nullable|max:30',
        'address_3' => 'nullable|max:30',
        'address_4' => 'nullable|max:30',
        'office_location' => 'nullable',
        'photo' => 'mimes:jpg,png|max:1024|nullable',


    ];

    public function mount()
    {
        $data = User::find(auth()->user()->id);
        $this->name = $data->name;
        $this->title = $data->title;
        $this->email = $data->email;
        $this->kode_agent = $data->kode_agent;
        $this->description = $data->description;
        $this->clients = $data->clients;
        $this->claims = $data->claims;
        $this->teams = $data->teams;
        $this->mobile = $data->mobile;
        $this->whatsapp = $data->whatsapp;
        $this->instagram = $data->instagram;
        $this->facebook = $data->facebook;
        $this->tiktok = $data->tiktok;
        $this->youtube = $data->youtube;
        $this->photo = $data->photo;
        $this->id = $data->id;
        $this->code = $data->code;
        $this->real_code = $data->code;
        $this->office = $data->office;
        $this->address_1 = $data->address_1;
        $this->address_2 = $data->address_2;
        $this->address_3 = $data->address_3;
        $this->address_4 = $data->address_4;
        $this->office_location = $data->office_location;
        $this->is_edit = true;
    }

    public function update()
    {
        $this->validate();
        if ($this->photo) {
            $filename = md5($this->photo . microtime()) . '.' . $this->photo->extension();
            $path = $this->photo->storeAs('photos', $filename, 'public');
        } else {
            $filename = $this->photo;
            $path = $this->photo;
        }
        $data = User::find($this->id);
        $data->name = trim($this->name);
        $data->title = $this->title;
        $data->email = $this->email;
        $data->kode_agent = trim($this->kode_agent);
        $data->description = $this->description;
        $data->clients = $this->clients;
        $data->claims = $this->claims;
        $data->teams = $this->teams;


        $data->office = $this->office;
        $data->address_1 = $this->address_1;
        $data->address_2 = $this->address_2;
        $data->address_3 = $this->address_3;
        $data->address_4 = $this->address_4;
        $data->office_location = $this->office_location;

        $data->mobile = trim($this->mobile);
        $data->whatsapp = trim($this->whatsapp);
        $data->instagram = trim($this->instagram);
        $data->facebook = trim($this->facebook);
        $data->tiktok = trim($this->tiktok);
        $data->youtube = trim($this->youtube);
        if ($this->photo) {
            $data->photo_name = $filename;
            $data->photo_path = $path;
        }
        if ($this->real_code != $this->code) {
            $data->code = trim($this->code);
            $data->link = 'https://link.accel365.id/Card/' . $data->code;
        }
        $data->save();
        generateVCF($data->id);
        $this->dispatch('success', message: 'Data updated');

        $this->is_edit = false;
    }

    public function render()
    {
        return view('livewire.update-data');
    }
}
