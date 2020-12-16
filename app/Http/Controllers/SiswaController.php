<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
	public function index(Request $request)
	{
		if($request->has('cari')){
			$data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
		}else{
			$data_siswa = \App\Siswa::all();
		}
		return view('siswa.index',['data_siswa' => $data_siswa]); //1
	}

	public function create (Request $request)
	{
		\App\Siswa::create($request->all());
		return redirect('/siswa')->with('sukses','Data Berhasil Di Input'); //2
	}

	public function edit($id) //3
	{
		$siswa = \App\Siswa::find($id);
		return view('siswa/edit',['siswa' => $siswa]); //4
	}
	public function update(Request $request,$id) //5
	{
		//dd($request->all());
		$siswa = \App\Siswa::find($id);
		$siswa->update($request->all());
		if($request->hasFile('avatar')){
			$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
			$siswa->avatar = $request->file('avatar')->getClientOriginalName();
			$siswa->save();
		}
		return redirect('/siswa')->with('sukses','Data Berhasil Di Update');
	}
	public function delete($id) //6
	{
		$siswa = \App\Siswa::find($id);
		$siswa->delete();
		return redirect('/siswa')->with('sukses','Data Berhasil Di Hapus');
	}

	public function profile($id) //7
	{
		$siswa = \App\Siswa::find($id);
		return view('siswa.profile',['siswa' => $siswa]);
	}
}
