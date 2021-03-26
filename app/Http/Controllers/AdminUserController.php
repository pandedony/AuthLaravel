<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
  public function getAllUserServerSide()
  {
      $data = User::latest()->get();
      return Datatables::of($data)
      ->editColumn("created_at", function ($data) {
          return date("m/d/Y", strtotime($data->created_at));
      })
      ->addColumn('Barcode', function ($data) {
        $update2 = QrCode::generate('/admin/userdata/'.$data->id);
        return $update2;
      })
      ->addColumn('Aksi', function ($data) {
        $update = '<a href="/admin/userdata/'.$data->id.'" class="btn btn-primary">' . 'Tampil' . '</a>';
        return $update;
      })
      ->rawColumns(['Aksi'])
      ->make(true);
  }

  public function indexGetUser()
  {
      return view("admin/user_server_side");
  }


  public function show(User $user)
  {
    return view('admin/userprofile', ['user' => $user]);
        // return $student;
  }

  public function printpdf()
  {
    $user = User::all();
    // return view('admin/userpdf', ['user' => $user]);

    $pdf = PDF::loadview('admin/userpdf',['user'=>$user]);
    return $pdf->download('laporan-pegawai-pdf');
  }

  public function export_excel()
  {
    return Excel::download(new UserExport, 'user.xlsx');
  }


  public function destroy(User $user)
  {
    User::destroy($user->id);
    return redirect('/admin/userdata')->with('status', 'Data User Berhasil Di Hapus');
  }
}
