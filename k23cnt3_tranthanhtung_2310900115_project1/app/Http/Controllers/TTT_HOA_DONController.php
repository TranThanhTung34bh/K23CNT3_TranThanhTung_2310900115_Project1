<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TTT_HOA_DON; 
class TTT_HOA_DONController extends Controller
{
    //
      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function TTTList()
    {
        $TTThoadons = TTT_HOA_DON::all();
        return view('TTTAdmins.TTThoadon.TTT-list', ['TTThoadons' => $TTThoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function TTTDetail($id)
    {
        // Tìm sản phẩm theo ID
        $TTThoadon = TTT_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('TTTAdmins.TTThoadon.TTT-detail', ['TTThoadon' => $TTThoadon]);
    }
}