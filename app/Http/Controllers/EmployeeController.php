<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Mail\DaleelAlkifahMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;


class EmployeeController extends Controller
{
    public function importDisplay()
    {
        return view('import.import');
    }

    public function importUpload(Request $request)
    {

        if (Input::hasFile('file')) {

            $path = Input::file('file')->getRealPath();

            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {

                foreach ($data as $key => $value) {
                    if($value->name!=''){
                        Employee::create(['name' => $value->name,
                            'extension' => $value->extension
                            , 'company' => $value->company
                            , 'department' => $value->department
                            , 'branch' => $value->branch]);
                    }

                }
            }

        }

        return back();

    }

    public function showMail()
    {
        return view('mail.show');
    }

    public function sendMail(Request $request)
    {

        Mail::to('omar.ceh007@gmail.com')
            ->send(new DaleelAlkifahMail($request->only('requesterName','requesterDetails')),['title'=>'Daleel Alkifah']);

        return redirect('/');
    }
}
