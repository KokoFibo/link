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