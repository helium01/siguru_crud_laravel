<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;


class mastercontrol extends Controller
{
    public function dashboard(){
        $a=DB::table('data_guru')->count();
        $b=DB::table('data_sekolah')->count();
        $c=DB::table('data_pengguna')->count();
        $d=DB::table('data_guru')
        ->leftJoin('data_pengguna', 'data_guru.id_pengguna', '=', 'data_guru.id_pengguna')
        ->leftJoin('data_sekolah', 'data_sekolah.id_sekolah', '=', 'data_sekolah.id_sekolah')
        ->get();
        return view('master.index',['guru'=>$a],['sekolah'=>$b],['pengguna'=>$c],['gurua'=>$d]);
    }
    public function guru(){
        $a=DB::table('data_pengguna')->get();
        $mat=DB::table('data_sekolah')->get();
        $b=DB::table('data_guru')->get();
        return view('master.guru',['pengguna'=>$a],['sekolah'=>$mat],['guru'=>$b]);
    }
    public function sekolah(){
        $a=DB::table('data_kelurahan')->get();
        $b=DB::table('data_sekolah')->get();
        return view('master.sekolah',['kelurahan'=>$a],['sekolah'=>$b]);
    }
    public function kelurahan(){
        $a=DB::table('data_kecamatan')->get();
        $b=DB::table('data_kelurahan')->get();
        return view('master.kelurahan',['kecamatan'=>$a],['kelurahan'=>$b]);
    }
    public function kecamatan(){
        $a=DB::table('data_kecamatan')->get();
        return view('master.kecamatan',['kecamatan'=>$a]);
    }
    public function pengguna(){
        $a=DB::table('data_pengguna')->get();
        return view('master.pengguna',['pengguna'=>$a]);
    }

    // controller untuk create post
    public function gurupost(Request $request){
        DB::table('data_guru')->insert([
          'nip'=>$request->nip,  
          'id_pengguna'=>$request->id_pengguna,  
          'alamat'=>$request->alamat,  
          'email'=>$request->email,  
          'ttl'=>$request->ttl,  
          'jabatan'=>$request->jabatan,  
          'id_sekolah'=>$request->id_sekolah
        ]);
        return redirect('/guru');
    }
    public function sekolahpost(Request $request){
        DB::table('data_sekolah')->insert([  
          'nama_sekolah'=>$request->nama_sekolah,  
          'alamat'=>$request->alamat,  
          'id_kelurahan'=>$request->id_kelurahan
        ]);
        return redirect('/sekolah');
    }
    public function penggunapost(Request $request){
        DB::table('data_pengguna')->insert([
          'nama_pengguna'=>$request->nama,  
          'username'=>$request->username,  
          'password'=>bcrypt($request->password)
        ]);
        return redirect('/pengguna');
    }
    public function kecamatanpost(Request $request){
        DB::table('data_kecamatan')->insert([
          'nama_kecamatan'=>$request->nama_kecamatan
        ]);
        return redirect('/kecamatan');
    }
    public function kelurahanpost(Request $request){
        DB::table('data_kelurahan')->insert([
          'nama_kelurahan'=>$request->nama_kelurahan,
          'id_kecamatan'=>$request->id_kecamatan
        ]);
        return redirect('/kelurahan');
    }
    // controller untuk delete ya
    public function delguru($id){
        DB::table('data_guru')->where('id_guru',$id)->delete();
        return redirect('/guru');
    }
    public function delsekolah($id){
        DB::table('data_sekolah')->where('id_sekolah',$id)->delete();
        return redirect('/sekolah');
    }
    public function delkelurahan($id){
        $a=DB::table('data_kecamatan')->get();
        DB::table('data_kelurahan')->where('id_kelurahan',$id)->delete();
        return redirect('/kelurahan');
    }
    public function delkecamatan($id){
        DB::table('data_kecamatan')->where('id_kecamatan',$id)->delete();
        return redirect('/kecamatan');
    }
    public function delpengguna($id){
        DB::table('data_pengguna')->where('id_pengguna',$id)->delete();
        return redirect('/pengguna');
    }
    // untuk edit
    public function editguru($id){
        $b=DB::table('data_guru')->where('id_guru',$id)->get();
        $a=DB::table('data_pengguna')->get();
        $mat=DB::table('data_sekolah')->get();
        return view('edit.guru',['edit'=>$b],['pengguna'=>$a],['sekolah'=>$mat]);
    }
    public function editsekolah($id){
        $b=DB::table('data_sekolah')->where('id_sekolah',$id)->get();
        return view('edit.sekolah',['edit'=>$b]);
    }
    public function editpengguna($id){
        $b=DB::table('data_pengguna')->where('id_pengguna',$id)->get();
        return view('edit.pengguna',['edit'=>$b]);
    }
    public function editkelurahan($id){
        $a=DB::table('data_kecamatan')->get();
        $b=DB::table('data_kelurahan')->where('id_kelurahan',$id)->get();
        return view('edit.kelurahan',['edit'=>$b],['kecamatan'=>$a]);
    }
    public function editkecamatan($id){
        $b=DB::table('data_kecamatan')->where('id_kecamatan',$id)->get();
        return view('edit.kecamatan',['edit'=>$b]);
    }
    // untuk post edit
    public function editgurupost(Request $request, $id){
        DB::table('data_guru')->where('id_guru',$id)->update([
            'nip'=>$request->nip,  
            'id_pengguna'=>$request->id_pengguna,  
            'alamat'=>$request->alamat,  
            'email'=>$request->email,  
            'ttl'=>$request->ttl,  
            'jabatan'=>$request->jabatan,  
            'id_sekolah'=>$request->id_sekolah 
        ]);
        return redirect('/guru');
    }
    public function editpenggunapost(Request $request, $id){
        DB::table('data_pengguna')->where('id_pengguna',$id)->update([
            'nama_pengguna'=>$request->nama,  
            'username'=>$request->username,  
            'password'=>bcrypt($request->password)
          ]);
          return redirect('/pengguna');
    }
    public function editkecamatanpost(Request $request, $id){
        DB::table('data_kecamatan')->where('id_kecamatan',$id)->update([
            'nama_kecamatan'=>$request->nama_kecamatan
          ]);
          return redirect('/kecamatan');
    }
    public function editkelurahanpost(Request $request, $id){
        DB::table('data_kelurahan')->where('id_kelurahan',$id)->update([
            'nama_kelurahan'=>$request->nama_kelurahan,  
            'id_kecamatan'=>$request->id_kecamatan, 
          ]);
          return redirect('/kelurahan');
    }
    public function editsekolahpost(Request $request, $id){
        DB::table('data_sekolah')->where('id_sekolah',$id)->update([
            'nama_sekolah'=>$request->nama_sekolah,  
          'alamat'=>$request->alamat,  
          'id_kelurahan'=>$request->id_kelurahan
          ]);
          return redirect('/sekolah');
    }

    public function login(){
        return view('master.login');
    }
    public function loginpost(Request $request){
        $masuk= $request->only('username','password');
        if(Auth::attempt($masuk)){
            return redirect('/');
        }
        return redirect('/');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('login');
    }

}
