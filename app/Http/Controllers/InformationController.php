<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function getAllList(){
        $all_information = Information::all();

        return view('home', compact('all_information'));
    }

    public function addListInformation(Request $req){
        $validation = $req->validate([
            'list_informasi' => 'required|string'
        ]);

        Information::create($validation);

        return redirect()->route('home')->with('success', 'Data sudah di update');
    }

    public function updateListInformation(Request $req, $id){
        $validation = $req->validate([
            'list_informasi' => 'required|string'
        ]);

        $information = Information::findOrFail($id);
        
        if(!$information){
            return response()->json([
                "Message" =>  "Data tidak ditemukan"
            ]);
        }

        $information->update($validation);

        return redirect()->route('home')->with('success', 'Data sudah di update');
    }

    public function deleteListInformation($id){
    
        $information = Information::findOrFail($id);
        if(!$information){
            return response()->json([
                "Message" =>  "Data tidak ditemukan"
            ]);
        }

        $information->delete();

        return redirect()->route('home')->with('success', 'Data sudah di update');        
    }

    public function showFormAction($id = null){
        $data = null;
        if($id){
            $data = Information::findOrFail($id);
        }

        return view('crud_page', compact("data"));
    }
}
