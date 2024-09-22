<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
//    public function __construct()
//    {
//        dd(auth()->user()->id);
//    }
    public function index()
    {
        $users = User::query()->paginate(10);
        return view('admin.users',['users'=>$users]);

    }
    public function exportSinglePdf($id)
    {
        $user = User::findOrFail($id);
        $pdf = Pdf::loadView('userPdf.single_pdf', compact('user'));
        return $pdf->download('user_' . $user->id . '.pdf');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
