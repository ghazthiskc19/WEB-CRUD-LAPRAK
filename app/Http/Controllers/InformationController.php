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
            'list_informasi' => 'required|string|min:3|max:255'
        ]);

        $validation['list_informasi'] = trim($validation['list_informasi']);

        Information::create($validation);

        return redirect()->route('home')->with('success', 'Data informasi berhasil ditambahkan');
    }

    public function updateListInformation(Request $req, $id){
        $validation = $req->validate([
            'list_informasi' => 'required|string|min:3|max:255'
        ]);

        $validation['list_informasi'] = trim($validation['list_informasi']);

        $information = Information::find($id);

        if (!$information) {
            return redirect()->route('home')->with('error', 'Data informasi tidak ditemukan');
        }

        $information->update($validation);

        return redirect()->route('home')->with('success', 'Data informasi berhasil diperbarui');
    }

    public function deleteListInformation($id){

        $information = Information::find($id);

        if (!$information) {
            return redirect()->route('home')->with('error', 'Data informasi tidak ditemukan');
        }

        $information->delete();

        return redirect()->route('home')->with('success', 'Data informasi berhasil dihapus');        
    }

    public function showFormAction($id = null){
        $data = null;
        if($id){
            $data = Information::find($id);

            if (!$data) {
                return redirect()->route('home')->with('error', 'Data informasi tidak ditemukan');
            }
        }

        return view('crud_page', compact("data"));
    }
}
