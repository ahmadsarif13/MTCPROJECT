<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\RequestPerbaikan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function riwayat(){
        $riwayat = RequestPerbaikan::with('employee');

        if (auth()->user()->role == "employee") {
            $employee = employee::where('user_id', auth()->user()->id)->first();
            $riwayat->where('employees_id', $employee->id);
        }

        // return $riwayat;
        return view('riwayat.index', [
            'title' => 'Riwayat Perbaikan',
            'riwayat' => $riwayat->get()
        ]);
    }

    public function perbaikan(){
        return view('perbaikan.index', [
            'title' => 'Form request perbaikan'
        ]);
    }

    public function storeRequest(Request $request){
        // dd($request->all());
        $request->validate([
            'damage' => 'required',
            'details' => 'required',
        ],
        [
            'damage.required' => 'Mohon isi kerusakan',
            'details.required' => 'Mohon jelaskan detail kerusakan',
        ]);

        $employee = employee::where('user_id', auth()->user()->id)->first();

        $rp = new RequestPerbaikan();
        $rp->employees_id = $employee->id;
        $rp->details = $request->details;
        $rp->damage = $request->damage;
        $rp->status = "pending";
        $rp->save();

        return redirect('/riwayat');
    }

    public function editRequest($id){
        $riwayat = RequestPerbaikan::find($id);
        return view('perbaikan.edit', [
            'title' => 'Edit status perbaikan',
            'riwayat' => $riwayat
        ]);
    }

    public function updatePerbaikan(Request $request, $id){
        $riwayat = RequestPerbaikan::find($id);
        $riwayat->status = $request->status;
        $riwayat->update();

        return redirect('/riwayat');
    }

    public function cetak($id){
        return view('riwayat.cetak', [
            'title' => 'Cetak Perbaikan',
            'data' => RequestPerbaikan::find($id)
        ]);
    }

    public function destroy($id){
        $riwayat = RequestPerbaikan::find($id);
    
        if($riwayat){
            $riwayat->delete();
            return redirect('/riwayat')->with('success', 'Permintaan perbaikan berhasil dihapus');
        } else {
            return redirect('/riwayat')->with('error', 'Permintaan perbaikan tidak ditemukan');
        }
    }
    
}
