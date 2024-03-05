<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegistrationWR extends Component
{
    public $is_add, $is_edit, $id;
    public $name, $email, $kode_agent, $mobile, $whatsapp;
    public $instagram, $facebook, $tiktok, $youtube, $photo;
    use WithPagination;
    use WithFileUploads;



    public function edit($id)
    {
        $data = User::find($id);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->kode_agent = $data->kode_agent;
        $this->mobile = $data->mobile;
        $this->whatsapp = $data->whatsapp;
        $this->instagram = $data->instagram;
        $this->facebook = $data->facebook;
        $this->tiktok = $data->tiktok;
        $this->youtube = $data->youtube;
        $this->photo = $data->photo;
        $this->id = $id;
        $this->is_edit = true;
    }

    public function update()
    {
        $this->validate();
        $data = User::find($this->id);
        $data->name = $this->name;
        $data->email = $this->email;
        $data->kode_agent = $this->kode_agent;
        $data->mobile = $this->mobile;
        $data->whatsapp = $this->whatsapp;
        $data->instagram = $this->instagram;
        $data->facebook = $this->facebook;
        $data->tiktok = $this->tiktok;
        $data->youtube = $this->youtube;
        $data->photo = $this->photo->store(path: 'photos');
        $data->save();
        $this->is_edit = false;
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'kode_agent' => 'nullable',
        'mobile' => 'nullable',
        'whatsapp' => 'nullable',
        'instagram' => 'nullable',
        'facebook' => 'nullable',
        'tiktok' => 'nullable',
        'youtube' => 'nullable',
        'photo' => 'image|max:1024',
    ];
    public function save()
    {
        $this->validate();
        $data = new User;
        $data->name = $this->name;
        $data->email = $this->email;
        $data->kode_agent = $this->kode_agent;
        $data->mobile = $this->mobile;
        $data->whatsapp = $this->whatsapp;
        $data->instagram = $this->instagram;
        $data->facebook = $this->facebook;
        $data->tiktok = $this->tiktok;
        $data->youtube = $this->youtube;
        $data->photo = $this->photo->store(path: 'photos');
        $data->save();
        $this->is_add = false;
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
    }

    public function mount()
    {
        $this->is_add = 0;
        $this->is_edit = 0;
        $this->clear_form();
    }


    public function clear_form()
    {
        $this->name = '';
        $this->email = '';
        $this->kode_agent = '';
        $this->mobile = '';
        $this->whatsapp = '';
        $this->instagram = '';
        $this->facebook = '';
        $this->tiktok = '';
        $this->youtube = '';
        $this->photo = '';
    }


    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.registration-w-r', [
            'users' => $users,
        ]);
    }
}
