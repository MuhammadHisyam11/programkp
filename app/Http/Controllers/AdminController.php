<?php

namespace App\Http\Controllers;

use App\Models\collection;
use App\Models\guidance;
use App\Models\dosen;
use App\Models\day;
use App\Models\lesson;
use App\Models\historyguidance;
use App\Models\historycollection;
use App\Models\User;
use \Carbon\Carbon;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    // admin user
    public function user(){
        $user = user::latest()->get();
        return view('admin.show.showuser', compact('user'));
    }
    public function destroy(user $user){
        $user->delete();
        return redirect()->route('index')->with('message', 'User deleted successfully');
    }

    // admin lesson
    public function dashless(){
        $dosen = dosen::all();
        $hari = day::all();
        $lesson = lesson::all();
        return view('admin.show.showlesson', compact('dosen', 'hari', 'lesson'));
    }

    public function createless(){
        $dosen = dosen::all();
        $hari = day::all();
        return view('admin.create.createlesson', compact('dosen', 'hari'));
    }

    public function storeless(Request $request){
        $this->validate($request,[
            'matkul' => 'required',
            'day_id' => 'required',
            'kelas' => 'required',
            'dosen_id' => 'required',
            'jam' => 'required',
        ]);

        lesson::create([
            'matkul' => $request->matkul,
            'day_id' => $request->day_id,
            'kelas' => $request->kelas,
            'dosen_id' => $request->dosen_id,
            'jam' => $request->jam,
        ]);

        return redirect()->route('lesson')->with('message', 'Data Telah Ditambah');
    }

    public function editless($id){
        $lesson = lesson::find($id);
        $dosen = dosen::all();
        $hari = day::all();

        return view('admin.edit.editlesson', compact('dosen', 'hari', 'lesson'));
    }

    public function updateless($id, Request $request){
        $lesson = lesson::find($id);
        $this->validate($request, [
            'matkul' => 'required',
            'day_id' => 'required',
            'kelas' => 'required',
            'dosen_id' => 'required',
            'jam' => 'required',
        ]);

        $lesson->update([
            'matkul' => $request->matkul,
            'day_id' => $request->day_id,
            'kelas' => $request->kelas,
            'dosen_id' => $request->dosen_id,
            'jam' => $request->jam,
        ]);

        return redirect()->route('lesson')->with('message', 'Data Telah Diupdate');
    }

    public function destroyless(lesson $lesson){
        $lesson->delete();
        return redirect()->route('lesson')->with('message', 'Data Telah Dihapus');
    }

    // admin dosen
    public function dashdosen(){
        $dosen = dosen::latest()->get();
        return view('admin.show.showdosen', compact('dosen'));
    }

    public function createdos(){
        return view('admin.create.createdosen');
    }

    public function storedos(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);

        dosen::create([
            'name' => $request->name,
        ]);
        return redirect()->route('dosen')->with('message', 'Data Berhasil Ditambah');
    }

    public function editdos($id){
        $dosen = dosen::find($id);
        return view('admin.edit.editdosen', compact('dosen'));
    }

    public function updatedos($id, Request $request){
        $dosen = dosen::find($id);
        $this->validate($request, [
            'name' => 'required',
        ]);

        $dosen->update([
            'name' => $request->name,
        ]);
        return redirect()->route('dosen')->with('message','Data Telah Diubah');
    }

    public function destroydos($id){
        dosen :: find($id)->delete();
        return redirect()->route('dosen')->with('message', 'Data Berhasil Dihapus');
    }

    // admin guidance
    public function guidance(){
        $guidance = guidance::latest()->get();
        $time = Carbon::now();
        return view('admin.show.showguidance', compact('guidance', 'time'));
    }
    public function acceptguid($id){
        $guidance = guidance::find($id);

        $user_id    = $guidance->user_id;
        $dosen_id   = $guidance->dosen_id;
        $slug       = $guidance->slug;
        $npm        = $guidance->npm;
        $keperluan  = $guidance->keperluan;
        $waktu      = $guidance->waktu;

        $historyguidance = new historyguidance();
        $historyguidance->user_id    = $user_id;
        $historyguidance->dosen_id   = $dosen_id;
        $historyguidance->npm        = $npm;
        $historyguidance->slug       = $slug;
        $historyguidance->keperluan  = $keperluan;
        $historyguidance->waktu      = $waktu;
        $historyguidance->status     = 'Diselesaikan Oleh Admin';
        $historyguidance->keterangan = 'Diselesaikan Oleh Admin';
        $historyguidance->save();
        $guidance->delete();

        return redirect()->route('admin.guidance')->with('message', 'Data Telah Dimasukkan ke History');
    }

    public function adminguid($id){
        $guidance = guidance::find($id);
        $dosen = dosen::all();
        return view('admin.edit.deleteguid', compact('guidance', 'dosen'));
    }

    public function delete($id, Request $request){
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
        $historyguidance->status = 'Dihapus Oleh Admin';
        $historyguidance->keterangan = $request->keterangan;
        $historyguidance->save();
        $guidance->delete();
        return redirect()->route('admin.guidance')->with('message', 'Data Telah Dihapus');
    }

    // admin collection
    public function collection(){
        $collection = collection::latest()->get();
        $coll = Carbon::now();
        return view('admin.show.showcollection', compact('collection', 'coll'));
    }

    public function acceptcoll($id){
        $collection = collection::find($id);

        $user_id    = $collection->user_id;
        $dosen_id   = $collection->dosen_id;
        $lesson_id  = $collection->lesson_id;
        $waktu      = $collection->waktu;

        $historycollection = new historycollection();
        $historycollection->user_id    = $user_id;
        $historycollection->dosen_id   = $dosen_id;
        $historycollection->lesson_id  = $lesson_id;
        $historycollection->waktu      = $waktu;
        $historycollection->status     = 'Diselesaikan Oleh Admin';
        $historycollection->keterangan = 'Diselesaikan Oleh Admin';
        $historycollection->save();
        $collection->delete();

        $historycollection->save();

        return redirect()->route('admin.collection')->with('message', 'Data Telah Dimasukkan ke History');
    }
    public function admincoll($id){
        $collection = collection::find($id);
        $lesson = lesson::all();
        $dosen = dosen::all();

        return view('admin.edit.deletecoll', compact('collection', 'lesson', 'dosen'));
    }
    public function destroycoll($id, Request $request){
        $collection = collection::find($id);

        $user_id    = $collection->user_id;
        $dosen_id   = $collection->dosen_id;
        $lesson_id  = $collection->lesson_id;
        $waktu      = $collection->waktu;

        $historycollection = new historycollection();
        $historycollection->user_id    = $user_id;
        $historycollection->dosen_id   = $dosen_id;
        $historycollection->lesson_id  = $lesson_id;
        $historycollection->waktu      = $waktu;
        $historycollection->status     = 'Dihapus Oleh Admin';
        $historycollection->keterangan = $request->keterangan;
        $historycollection->save();
        $collection->delete();

        return redirect()->route('admin.collection')->with('message', 'Data Telah Dihapus');
    }
}
