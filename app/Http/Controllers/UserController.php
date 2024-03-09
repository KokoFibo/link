<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

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
            $vcard->addAddress('FP One', 'Thamrin Nine Complex', 'Autograph Tower', '28th Floor', 'Jl. M.H Thamrin No. 10', '10230', 'Jakarta Pusat');
            // $vcard->addLabel('street, worktown, workpostcode Belgium');
            $vcard->addURL('http://www.accel365.id', 'PREF;My Website');
            if ($data->photo_path) {
                $path = "storage/photos/ $data->photo_name";
                $path = preg_replace('/\s+/', '', $path);
                $path = storage_path('app/public/photos/' . $data->photo_name);
                // $vcard->addPhoto(public_path($path));
                $vcard->addPhoto($path);
            } else {
                $vcard->addPhoto(public_path('/images/pp.png'));
            }
            $nama_file = $data->name . '-' . $data->kode_agent;
            $vcard->setFilename($nama_file, true);

            // return vcard as a string
            //return $vcard->getOutput();

            // return vcard as a download
            // return $vcard->download();

            // save vcard on disk
            $path = storage_path('app/public/photos');
            $vcard->setSavePath($path);
            $vcard->save();
            return $vcard->download();

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

    public function user($code)
    {
        $data = User::where('code', $code)->first();
        $currentURL = url()->full();

        $myurl = url("/Card/{$data->code}");
        dd($myurl);

        $data1 = [
            "name" => "Laravel Package Tutorial",
            "short_name" => "LPT",
            "start_url" => $myurl,
            "background_color" => "#6777ef",
            "description" => "Tutorial of Laravel Package",
            "display" => "fullscreen",
            "theme_color" => "#6777ef",
            "icons" => [
                [
                    "src" => "logoaccel365.PNG",
                    "sizes" => "512x512",
                    "type" => "image/png",
                    "purpose" => "any maskable"

                ]
            ]
        ];
        Storage::disk('public1')->put('manifest.json', json_encode($data1));

        return view('link', [
            'data' => $data
        ]);
    }
}
