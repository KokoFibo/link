<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;

class UserController extends Controller
{

    public function vcf($code)
    {
        $data = User::where('code', $code)->first();

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
            $vcard->addRole('Data Protection Officer');
            $vcard->addEmail($data->email);
            $vcard->addPhoneNumber($data->mobile, 'PREF;WORK');
            // $vcard->addPhoneNumber(123456789, 'WORK');
            // $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
            $vcard->addAddress('1', '2', 'Jl.Fpone no 16', 'Jakarta', '3', '11320', 'Indonesia');
            $vcard->addLabel('street, worktown, workpostcode Belgium');
            $vcard->addURL('http://www.accel365.id');
            if ($data->photo_path) {
                $path = "storage/photos/ $data->photo_name";
                $path = preg_replace('/\s+/', '', $path);

                $vcard->addPhoto(public_path($path));
            } else {
                $vcard->addPhoto(public_path('/images/pp.png'));
            }

            // return vcard as a string
            //return $vcard->getOutput();

            // return vcard as a download
            // return $vcard->download();
            $vcard->setSavePath(storage_path('vcard/'));
            $vcard->save();

            $filename = $vcard->getFileName();

            return response()->download(storage_path("vcard/{$filename}"));

            // save vcard on disk
            //$vcard->setSavePath('/path/to/directory');
            //$vcard->save();
        } else {
            return back();
        }
    }

    public function user($code)
    {
        // dd(auth()->user()->id);
        // $data = User::find(auth()->user()->id);
        $data = User::where('code', $code)->first();
        return view('link', [
            'data' => $data
        ]);
    }
}
