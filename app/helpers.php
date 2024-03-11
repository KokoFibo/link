<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JeroenDesloovere\VCard\VCard;

function roleName($role)
{
    $roleName = "";
    switch ($role) {
        case 1:
            $roleName = 'User';
            break;
        case 2:
            $roleName = 'Admin';
            break;
        case 3:
            $roleName = 'Super Admin';
            break;
        case 4:
            $roleName = 'Developer';
            break;
    }
    return  $roleName;
}

function getLink($id)
{
    $data = User::find($id);
    if ($data != null) {
        return  $data->link;
    } else {
        return  '';
    }
}

function nama_file($nama_file, $kode_agent)
{
    $arrNama = explode(' ', $nama_file);
    return strtolower($arrNama[0]) . '-' . $kode_agent . '.vcf';
}

function create_code()
{
    return fake()->word();
}

function getFrontName($nama)
{
    $arrNama = explode(' ', $nama);
    return $arrNama[0];
}

function generateVCF($id)
{
    $data = User::find($id);

    if ($data) {
        // define vcard
        $vcard = new VCard();

        // define variables
        // $lastname = ;
        $firstname = $data->name;

        // $additional = '';
        // $prefix = '';
        // $suffix = '';

        // add personal data
        // $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
        $vcard->addName($firstname);

        // add work data
        $vcard->addCompany('FpOne');
        $vcard->addJobtitle($data->title);
        // $vcard->addRole('Data Protection Officer');
        $vcard->addEmail($data->email, 'PREF;WORK');
        $vcard->addPhoneNumber($data->mobile, 'PREF;WORK');
        // $vcard->addPhoneNumber(123456789, 'WORK');
        // $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
        $vcard->addAddress('FP One', 'Thamrin Nine Complex', 'Autograph Tower', '28th Floor', 'Jl. M.H Thamrin No. 10', '10230', 'Jakarta Pusat');
        $vcard->addAddress($data->office, null, $data->address_1, $data->address_2, $data->address_3, $data->address_4, null);
        // $vcard->addLabel('street, worktown, workpostcode Belgium');
        $vcard->addURL('https://www.accel365.id');
        if ($data->photo_path) {
            $path = "storage/photos/ $data->photo_name";
            $path = preg_replace('/\s+/', '', $path);
            $path = storage_path('app/public/photos/' . $data->photo_name);
            // $vcard->addPhoto(public_path($path));
            $vcard->addPhoto($path);
        } else {
            $vcard->addPhoto(public_path('/images/pp.png'));
        }
        $frontName = getFrontName(trim($data->name));

        $nama_file = $frontName . '-' . trim($data->kode_agent);
        $vcard->setFilename($nama_file, true);

        // return vcard as a string
        //return $vcard->getOutput();

        // return vcard as a download
        // return $vcard->download();

        // save vcard on disk
        $path = storage_path('app/public/photos');
        $vcard->setSavePath($path);
        $vcard->save();
        // return $vcard->download();

        // return back();

        // echo message


        // $vcard->setSavePath(storage_path('vcard/'));
        // $vcard->save();
        // $filename = $vcard->getFileName();
        // return response()->download(storage_path("vcard/{$filename}"));

        // save vcard on disk
        //$vcard->setSavePath('/path/to/directory');
        // $vcard->save();
    } else {
        return back();
    }
}
