<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegistrationWR extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $is_add, $is_edit, $id;
    public $name, $title, $email, $kode_agent, $mobile, $whatsapp;
    public $instagram, $facebook, $tiktok, $youtube, $photo;




    public function edit($id)
    {
        $data = User::find($id);
        $this->name = $data->name;
        $this->title = $data->title;
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
        if ($this->photo) {
            $filename = md5($this->photo . microtime()) . '.' . $this->photo->extension();
            $path = $this->photo->storeAs('photos', $filename, 'public');
        } else {
            $filename = $this->photo;
            $path = $this->photo;
        }
        $data = User::find($this->id);
        $data->name = $this->name;
        $data->title = $this->title;
        $data->email = $this->email;
        $data->kode_agent = $this->kode_agent;
        $data->mobile = $this->mobile;
        $data->whatsapp = $this->whatsapp;
        $data->instagram = $this->instagram;
        $data->facebook = $this->facebook;
        $data->tiktok = $this->tiktok;
        $data->youtube = $this->youtube;
        $data->photo_name = $filename;
        $data->photo_path = $path;
        $data->save();
        $this->is_edit = false;
    }

    protected $rules = [
        'name' => 'required',
        'title' => 'required',
        'email' => 'required',
        'kode_agent' => 'required|integer',
        'mobile' => 'nullable',
        'whatsapp' => 'nullable',
        'instagram' => 'nullable',
        'facebook' => 'nullable',
        'tiktok' => 'nullable',
        'youtube' => 'nullable',
        'photo' => 'mimes:jpg,png|max:1024|nullable',

    ];
    public function save()
    {
        $this->validate();
        if ($this->photo) {
            $filename = md5($this->photo . microtime()) . '.' . $this->photo->extension();
            $path = $this->photo->storeAs('photos', $filename, 'public');
        } else {
            $filename = $this->photo;
            $path = $this->photo;
        }

        $data = new User;
        $data->name = $this->name;
        $data->title = $this->title;
        $data->password = Hash::make('12345678');
        $data->email = $this->email;
        $data->kode_agent = $this->kode_agent;
        $data->mobile = $this->mobile;
        $data->whatsapp = $this->whatsapp;
        $data->instagram = $this->instagram;
        $data->facebook = $this->facebook;
        $data->tiktok = $this->tiktok;
        $data->youtube = $this->youtube;
        $data->photo_name = $filename;
        $data->photo_path = $path;
        $data->code = Str::toBase64($this->kode_agent);
        $data->link = 'https://link.accel365.id/Card/' . $data->code;

        // $this->photo->store(path: 'photos');

        // $data->photo = $filename;
        $data->save();
        $this->is_add = false;
        $this->reset();
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
        $this->title = '';
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
        $users = User::orderBy('id', 'desc')->paginate(5);
        return view('livewire.registration-w-r', [
            'users' => $users,
        ]);
    }
}
