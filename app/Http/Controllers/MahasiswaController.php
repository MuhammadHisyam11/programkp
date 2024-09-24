<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\user;
use App\Models\guidance;
use App\Models\historyguidance;
use App\Models\collection;
use App\Models\historycollection;
use App\Models\lesson;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function privdash(){
        return view('private.index');
    }

    // private Controller
    public function privindex(){
        return view('private.dashboard');
    }
    public function privguidance(){
        $user_id = auth()->user()->id;
        $guidance = guidance::where('user_id', $user_id)->get();
        return view('private.show.postguidance', compact('guidance'));
    }

    public function privcollection(){
        $user_id = auth()->user()->id;
        $collection = collection::where('user_id', $user_id)->get();
        return view('private.show.postcollection', compact('collection'));
    }

    // Public Controller
    public function postguidance(){
        $guidance = guidance::latest()->get();
        return view('public.show.guidance', compact('guidance'));
    }
    public function postcollection(){
        $collection = collection::latest()->get();
        return view('public.show.collection', compact('collection'));
    }
    public function postlesson(){
        $lesson = lesson::all();
        return view('public.show.lesson', compact('lesson'));
    }

    // guidance
    public function createguid(){
        $dosen = dosen::all();
        $user = user::all();
        return view('private.create.createguidance', compact('dosen', 'user'));
    }

    public function storeguid(Request $request){
        $this->validate($request,[
            'npm' => 'required',
            'keperluan' => 'required',
            'dosen_id' => 'required',
            'waktu' => 'required',
        ]);

        guidance::create([
            'user_id' => auth()->user()->id,
            'npm' => $request->npm,
            'slug' => \Str::slug($request->keperluan),
            'keperluan' => $request->keperluan,
            'dosen_id' => $request->dosen_id,
            'waktu' => $request->waktu,
        ]);
        return redirect()->route('active.guid')->with('message', 'Anda Berhasil Membuat Postingan');
    }

    public function editguid(guidance $guidance){
        $dosen = dosen::all();
        return view('private.edit.editguidance', compact('guidance', 'dosen'));
    }

    public function updateguid(guidance $guidance, Request $request){
        $this->validate($request,[
            'npm' => 'required',
            'keperluan' => 'required',
            'dosen_id' => 'required',
            'waktu' => 'required',
        ]);

        $guidance->update([
            'npm' => $request->npm,
            'slug' => \Str::slug($request->keperluan),
            'keperluan' => $request->keperluan,
            'dosen_id' => $request->dosen_id,
            'waktu' => $request->waktu,
        ]);

        return redirect()->route('active.guid')->with('message','Postingan Anda Berhasil Diubah');
    }

    public function destroyguid($id){
        $guidance = guidance::find($id);

        $user_id    = $guidance->user_id;
        $dosen_id   = $guidance->dosen_id;
        $slug       = $guidance->slug;
        $npm        = $guidance->npm;
        $keperluan  = $guidance->keperluan;
        $waktu      = $guidance->waktu;

        $historyguidance = new historyguidance();
        $historyguidance->user_id = $user_id;
        $historyguidance->dosen_id = $dosen_id;
        $historyguidance->npm = $npm;
        $historyguidance->slug = $slug;
        $historyguidance->keperluan = $keperluan;
        $historyguidance->waktu = $waktu;
        $historyguidance->status = 'Dihapus';
        $historyguidance->keterangan = 'Dihapus Oleh User';
        $historyguidance->save();
        $guidance->delete();


        return redirect()->route('history.guidance')->with('message', 'Data Anda Telah Dimasukkan ke History');
    }

    // collection
    public function createcoll(){
        $dosen = dosen::all();
        $lesson = lesson::all();

        return view('private.create.createcollection', compact('dosen', 'lesson'));
    }

    public function storecoll(Request $request){
        $this->validate($request,[
            'lesson_id' => 'required',
            'dosen_id' => 'required',
            'waktu' => 'required',
        ]);

        collection::create([
            'user_id' => auth()->user()->id,
            'lesson_id' => $request->lesson_id,
            'dosen_id' => $request->dosen_id,
            'waktu' => $request->waktu,
        ]);
        return redirect()->route('active.coll')->with('mesage', 'Anda Berhasil Membuat Postingan');
    }

    public function editcoll($id){
        $collection = collection::find($id);
        $dosen = dosen::all();
        $lesson = lesson::all();
        return view('private.edit.editcollection', compact('collection', 'dosen',  'lesson'));
    }

    public function updatecoll($id, Request $request){
        $collection = collection::find($id);
        $this->validate($request,[
            'lesson_id' => 'required',
            'dosen_id' => 'required',
            'waktu' => 'required',
        ]);

        $collection->update([
            'lesson_id' => $request->lesson_id,
            'dosen_id' => $request->dosen_id,
            'waktu' => $request->waktu,
        ]);

        return redirect()->route('active.coll')->with('message','Postingan Anda Berhasil Diubah');
    }

    public function destroycoll($id){
        $collection = collection::find($id);

        $user_id    = $collection->user_id;
        $dosen_id   = $collection->dosen_id;
        $lesson_id  = $collection->lesson_id;
        $waktu      = $collection->waktu;

        $historycollection = new historycollection();
        $historycollection->user_id   = $user_id;
        $historycollection->dosen_id  = $dosen_id;
        $historycollection->lesson_id = $lesson_id;
        $historycollection->waktu     = $waktu;
        $historycollection->status    = 'Dihapus';
        $historycollection->keterangan= 'Dihapus Oleh User';
        $historycollection->save();
        $collection->delete();


        return redirect()->route('history.collection')->with('message', 'Data Anda Telah Dimasukkan ke History');
    }

    //private history
    public function hist(){
        return view('private.history.index');
    }

    // history guidance
    public function histguidance(){
        $user_id = auth()->user()->id;
        $historyguidance = historyguidance::where('user_id', $user_id)->get();
        return view('private.history.historyguidance', compact('historyguidance'));
    }

    public function acceptguid($id){
        $guidance = guidance::find($id);

        $user_id    = $guidance->user_id;
        $dosen_id   = $guidance->dosen_id;
        $slug       = $guidance->slug;
        $npm        = $guidance->npm;
        $keperluan  = $guidance->keperluan;
        $waktu        = $guidance->waktu;

        $historyguidance = new historyguidance();
        $historyguidance->user_id = $user_id;
        $historyguidance->dosen_id = $dosen_id;
        $historyguidance->npm = $npm;
        $historyguidance->slug = $slug;
        $historyguidance->keperluan = $keperluan;
        $historyguidance->waktu = $waktu;
        $historyguidance->status = 'Selesai';
        $historyguidance->keterangan = 'Diselesaikan Oleh User';
        $historyguidance->save();
        $guidance->delete();

        $historyguidance->save();

        return redirect()->route('history.guidance')->with('message', 'Data Anda Telah Dimasukkan ke History');
    }

    // historycollection
    public function histcollection(){
        $user_id = auth()->user()->id;
        $history = historycollection::where('user_id', $user_id)->get();
        return view('private.history.historycollection', compact('history'));
    }

    public function acceptcoll($id){
        $collection = collection::find($id);

        $user_id    = $collection->user_id;
        $dosen_id   = $collection->dosen_id;
        $lesson_id  = $collection->lesson_id;
        $waktu      = $collection->waktu;

        $historycollection = new historycollection();
        $historycollection->user_id   = $user_id;
        $historycollection->dosen_id  = $dosen_id;
        $historycollection->lesson_id = $lesson_id;
        $historycollection->waktu     = $waktu;
        $historycollection->status = 'Selesai';
        $historycollection->keterangan = 'Diselesaikan Oleh User';
        $historycollection->save();
        $collection->delete();

        $historycollection->save();

        return redirect()->route('history.collection')->with('message', 'Data Anda Telah Dimasukkan ke History');
    }

}
