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

        // define vcard
        $vcard = new VCard();

        // define variables
        $lastname = 'Desloovere';
        $firstname = 'Jeroen';
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        $vcard->addCompany('Siesqo');
        $vcard->addJobtitle('Web Developer');
        $vcard->addRole('Data Protection Officer');
        $vcard->addEmail('info@jeroendesloovere.be');
        $vcard->addPhoneNumber(1234121212, 'PREF;WORK');
        $vcard->addPhoneNumber(123456789, 'WORK');
        $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
        $vcard->addLabel('street, worktown, workpostcode Belgium');
        $vcard->addURL('http://www.jeroendesloovere.be');

        $vcard->addPhoto(__DIR__ . '/landscape.jpeg');

        // return vcard as a string
        //return $vcard->getOutput();

        // return vcard as a download
        return $vcard->download();

        // save vcard on disk
        //$vcard->setSavePath('/path/to/directory');
        //$vcard->save();

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
