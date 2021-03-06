<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data_siswa = DB::table('siswa')->where('nama_depan','like','%'.$request->search.'%')->get();
        }
        else{
            $data_siswa = \App\Models\Siswa::all();
        }
        return view('siswa.index',['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_depan'=>'required|min:5',
            'nama_belakang'=>'required',
            'email'=>'required|email|unique:users',
            'jenis_kelamin'=>'required',
            'agama'=>'required',
            'avatar'=>'mimes:jpg,png'
        ]);

        $user = new \App\Models\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Models\Siswa::create($request->all());
        if($request->hasfile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data berhasil di input!');
    }

    public function edit($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa/edit',['siswa' => $siswa]);
    }

    public function update(Request $request,$id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasfile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data berhasil di update!');
    }

    public function delete($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses','Data berhasil di hapus!');
    }

    public function profile($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $matapelajaran = \App\Models\Mapel::all();
        $categories = [];
        $data = [];
        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp->name;
                $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }
        }
        return view('siswa.profile',['siswa' => $siswa,'matapelajaran' => $matapelajaran,'categories' => $categories,'data' => $data]);
    }

    public function addnilai(Request $request,$idsiswa)
    {
        $siswa = \App\Models\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            return redirect('siswa/'.$idsiswa.'/profile')->with('error','Data nilai mata pelajaran ini sudah ada!');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);
        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Data nilai berhasil dimasukan!');
    }
}
