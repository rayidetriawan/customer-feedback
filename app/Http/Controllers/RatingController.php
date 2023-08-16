<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use App\Tiket;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function insert(Request $request){
        $data = [
            'id_ticket' => $request->idTIket,
            'rating'    => $request->rating,
            'reported'  => Auth::user()->username,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        Rating::insert($data);
        // $data = Tiket::where('reported','=', Auth::user()->username)->paginate(10);
        
        // return view('transaksi.myticket', compact('data'));
        // 
        return redirect()->route('detail.ticket',$request->idTIket)->with('message','Rating Berhasil Disimpan!');
    }
}
