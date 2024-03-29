<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JeroenDesloovere\VCard\VCard;
use Psy\CodeCleaner\AssignThisVariablePass;

class RegistrationWR extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $is_add, $is_edit, $id;
    public $name, $title, $email, $kode_agent, $mobile, $whatsapp;
    public $instagram, $facebook, $tiktok, $youtube, $photo, $description, $clients, $claims, $teams, $real_code, $code, $form_open, $role;
    public $office, $address_1, $address_2, $address_3, $address_4;
    public $office_location;
    public $office_location_default = 'https://maps.app.goo.gl/FU5Y65VWziBBwmWU8';

    public function default_location()
    {
        $this->office_location = $this->office_location_default;
    }

    public function addNew()
    {

        $this->reset();
        $this->is_add = true;
        $this->office = 'FP One';
        $this->address_1 = 'Thamrin Nine Complex';
        $this->address_2 = 'Autograph Tower 28th Floor';
        $this->address_3 = 'Jl. M.H Thamrin No. 10';
        $this->address_4 = 'Jakarta Pusat - 10230';
        $this->office_location = $this->office_location_default;

        $this->form_open = true;
    }

    public function cancel()
    {

        $this->is_edit = false;
        $this->is_add = false;
        $this->form_open = false;

        $this->reset();
    }


    public function edit($id)
    {
        $data = User::find($id);
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
        $this->role = $data->role;
        $this->id = $id;
        $this->code = $data->code;
        $this->real_code = $data->code;
        $this->is_edit = true;
        $this->form_open = true;
        $this->office = $data->office;
        $this->office_location = $data->office_location;
        $this->address_1 = $data->address_1;
        $this->address_2 = $data->address_2;
        $this->address_3 = $data->address_3;
        $this->address_4 = $data->address_4;
    }

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
        $data->name = trim($this->name);
        $data->title = $this->title;
        $data->password = Hash::make('12345678');
        $data->email = $this->email;
        $data->kode_agent = trim($this->kode_agent);
        $data->description = $this->description;
        $data->clients = $this->clients;
        $data->claims = $this->claims;
        $data->teams = $this->teams;
        $data->office = $this->office;
        $data->office_location = $this->office_location;
        $data->address_1 = $this->address_1;
        $data->address_2 = $this->address_2;
        $data->address_3 = $this->address_3;
        $data->address_4 = $this->address_4;



        $data->mobile = trim($this->mobile);
        $data->whatsapp = trim($this->whatsapp);
        $data->instagram = trim($this->instagram);
        $data->facebook = trim($this->facebook);
        $data->tiktok = trim($this->tiktok);
        $data->youtube = trim($this->youtube);
        $data->photo_name = $filename;
        $data->photo_path = $path;
        $data->code = Str::toBase64(create_code());
        $data->link = 'https://link.accel365.id/Card/' . $data->code;

        // $this->photo->store(path: 'photos');

        // $data->photo = $filename;
        $data->save();
        generateVCF($data->id);
        $this->is_add = false;
        $this->form_open = false;
        $this->dispatch('success', message: 'Data Saved');

        $this->reset();
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
        $data->role = $this->role;

        $data->office = $this->office;
        $data->office_location = $this->office_location;
        $data->address_1 = $this->address_1;
        $data->address_2 = $this->address_2;
        $data->address_3 = $this->address_3;
        $data->address_4 = $this->address_4;

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
        $this->form_open = false;
    }

    protected $rules = [
        'name' => 'required',
        'title' => 'nullable',
        'email' => 'required|email',
        'office' => 'nullable|max:25',
        'office_location' => 'nullable',
        'address_1' => 'nullable|max:30',
        'address_2' => 'nullable|max:30',
        'address_3' => 'nullable|max:30',
        'address_4' => 'nullable|max:30',
        'photo' => 'mimes:jpg,png|max:1024|nullable',
        // 'photo' => 'image|max:1024|nullable',


    ];


    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
    }

    public function mount()
    {
        $this->is_add = 0;
        $this->is_edit = 0;
        $this->is_editPhoto = 0;
        // $this->form_open = 1;
        $this->clear_form();
    }


    public function clear_form()
    {
        $this->name = '';
        $this->title = '';
        $this->email = '';
        $this->office_location = '';
    }





    public function render()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        return view('livewire.registration-w-r', [
            'users' => $users,
        ]);
    }
}
