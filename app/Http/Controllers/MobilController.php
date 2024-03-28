<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use \Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan',
                'data' => $validator->errors()
            ]);
        }

        $mobil = new Mobil();
        $mobil->nama = $request->nama;
        $mobil->harga = $request->harga;
        $mobil->deskripsi = $request->deskripsi;
        $mobil->save();

        return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $mobil
        ]);
    }
    
    public function read()
    {
        $mobils = Mobil::all();
        
        if(!$mobils->isEmpty()) {
           return response()->json([
                   'success' => true,
                   'message' => 'Data berhasil ditampilkan',
                   'data' => $mobils
           ]);
        }
        else {
            return response()->json([
                    'success' => false,
                    'message' => 'Data gagal ditampilkan',
                    'data' => $mobils
            ]);
        }
       return response()->json($mobils);
    }

    public function detail($id)
    {
        $mobil = Mobil::find($id);
        
        if($mobil) {
           return response()->json([
                   'success' => true,
                   'message' => 'Data berhasil ditampilkan',
                   'data' => $mobil
           ]);
        }
        else {
            return response()->json([
                    'success' => false,
                    'message' => 'Data gagal ditampilkan',
                    'data' => $mobil
            ]);
        }
       return response()->json($mobil);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan',
                'data' => $validator->errors()
            ]);
        }

        $mobil = Mobil::find($id);
        $mobil->nama = $request->nama;
        $mobil->harga = $request->harga;
        $mobil->deskripsi = $request->deskripsi;
        $mobil->save();

        return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $mobil
        ]);
    }
    public function delete($id)
    {
        $mobil = Mobil::find($id);
        if($mobil) {
            $mobil->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                'data' => $mobil
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal dihapus',
                'data' => $mobil
            ]);
        }
    }
}