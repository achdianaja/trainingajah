<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Klasement;
use App\Exports\UserExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\DescriptionModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('contents.index', compact('users'));
    }

    
    public function create()
    {
        return view('contents.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        
        $user = User::create($validatedData);

        $descriptions = $request->input('description');
        foreach ($descriptions as $description){
            DescriptionModel::create([
                'user_id'     => $user->id,
                'description' => $description,
            ]);
        }
        return redirect('/user');
    }

    public function edit($id){
        $users = User::where('id', $id)->first();
        $description = DescriptionModel::where('user_id', $id)->get();
        return view('contents.edit', compact('users', 'description'));
    }

    // public function update(Request $request, $id){ 
    //     $input = $request->input('description');
    //     if (in_array(null, $input, true)) {
    //         $input = $request->input('description_id');
    //         foreach ($input as $filter) {
    //             if ($filter != null) {
    //                 $data[] = $filter;
    //             }
    //         }
    //         DescriptionModel::where('user_id',$id)->whereNotIn('id', $data)->delete();
    //     } else {
    //         $input = $request->input('description');
    //         $description = DescriptionModel::whereNotIn('id', $input)->delete();
    //         // dd($description);
    //         foreach ($input as $filter) {
    //             $create = DescriptionModel::create([
    //                 'user_id' => $id,
    //                 'description' => $filter,
    //             ]);
    //         }
    //         // dd($data);
    //         $value = DescriptionModel::where('user_id',$id);
    //     }
    //     return redirect()->back();

    // }   

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $validated = $request->validate([
            'description.*' => 'required',
        ]);

        // dd($request);

        $description = $request->input('description');
        $descriptionIds = $request->input('descriptionId');

        foreach ($description as $key => $desc) {
            if (isset($descriptionIds[$key])) {
                // Update deskripsi yang sudah ada
                $descriptionModel = DescriptionModel::find($descriptionIds[$key]);

                if ($descriptionModel) {
                    $descriptionModel->update([
                        'description' => $desc
                    ]);
                }
            } else {
                // Buat deskripsi baru
                DescriptionModel::create([
                    'user_id' => $user->id,
                    'description' => $desc
                ]);
            }
        }

        return redirect()->back();
    }

        
    // public function update(Request $request, $id)
    // {
    //     $user = User::find($id);

    //     if(isset($request->descDelete) && $request->description){
    //         // $request->validate([
    //         // 'images.*' => 'mimes:jpg,jpeg,png,gif|max:2000'
    //         // ], );

    //         $data = DescriptionModel::where('id', $request->descDelete)->get();
    //         foreach ($data as $value) {
    //             DB::table('description_models')->delete($value->description);
    //         }
    //         $this->queryDescDelete($request->descDelete);
    //         foreach($request->description as $desc){
    //         if(!empty($request->description)){
    //                 DescriptionModel::create([
    //                     "user_id" => $user->id,
    //                     "description" => $desc
    //                 ]);
    //             }
    //         }
    //     }elseif(isset($request->descDelete ) && !$request->description){
    //         $myDesc = DescriptionModel::where('id', $request->descDelete)->get();
    //         foreach($myDesc as $iDesc){
    //             DB::table('description_models')->delete($iDesc->description);
    //         }
    //         // dd('hallo');
    //         $this->queryDescDelete($request->descDelete);
    //     }elseif($request->description && !$request->descDelete){
    //         // $request->validate([
    //         //     'images.*' => 'mimes:jpg,jpeg,png,gif|max:2000'
    //         // ], );
    //         foreach($request->description as $desc){
    //             if(!empty($request->description)){
    //                 DescriptionModel::create([
    //                     "user_id" => $user->id,
    //                     "description" => $desc
    //                 ]);
    //             }
    //         }
    //     }

    //     return redirect()->back();
    // }
    
    // public function queryDescDelete($descDelete){
    //     foreach($descDelete as $desc){
    //         DescriptionModel::where('id', $desc)->delete();
    //     }
    // }

    public function deletedesc(Request $request)
    {
        $descriptionId = $request->descriptionId;
        DescriptionModel::where('id', $descriptionId)->delete();

        return response()->json(['message' => 'Deskripsi berhasil dihapus']);
    }
    
    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('/user');
    }

    public function upimport(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return redirect('/route-import');
    }

    public function upexport()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }

    public function pdfexport(){
        $user = Klasement::all();
        $pdf = PDF::loadview('pdf', ['user' => $user]);
        return $pdf->download('data-user.pdf');
    }

}
