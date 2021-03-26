<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    public function index()
    {
      $user = User::all();
      return view('admin/dashboard', ['user' => $user]);
    }
}
