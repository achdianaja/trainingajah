<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Exports\UserExport;
use App\Imports\UsersImport;
use App\Models\Klasement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function import(){
        $user = Klasement::all();
        return view('excel', compact('user'));
    }

    public function upimport(Request $request){
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return redirect('/route-import');
    }

    public function upexport(){
        return Excel::download(new UserExport, 'user.xlsx');
    }

    public function pdfexport(){
        $user = Klasement::all();
        $pdf = PDF::loadview('pdf', ['user' => $user]);
        return $pdf->download('data-user.pdf');
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'negara' => 'required',
            'poin' => 'required',
            'posisi' => 'required',
        ]);
        Klasement::create($validatedData);
        return redirect('/route-import');
    }

    public function edit(){
        $users = Klasement::get();
        return view('edit', compact('users'));
    }

    public function delete($id)
    {
        Klasement::where('id', $id)->delete();
        return redirect('/route-import');
    }

}
