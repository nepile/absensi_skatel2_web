<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\ClassUser;
use App\Models\User;
use App\Utils\ReadExcel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UsersController extends Controller
{
    protected function showGuru()
    {
        $data = [
            'title'     => 'Guru',
            'id_page'   => 3,
            'users'     => User::with('level')->where('level_id', 2)->get()
        ];

        return view('core.users', $data);
    }

    protected function showSiswa()
    {
        $data = [
            'title'     => 'Siswa',
            'id_page'   => 4,
            'classes'   => ClassUser::all(),
            'users'     => User::with(['level', 'class'])->where('level_id', 3)->get()
        ];

        return view('core.users', $data);
    }

    protected function createUser(Request $request)
    {
        try {
            DB::table('users')->insert([
                'username'      => $request->username,
                'name'          => $request->name,
                'password'      => bcrypt($request->username),
                'level_id'      => $request->level_id,
                'class_id'      => $request->class_id,
                'created_at'    => now()
            ]);

            return back()->with('success', 'Berhasil menambahkan data');
        } catch (Exception $e) {
            return back()->with('error', 'NIS/NIP sudah digunakan sebelumnya.');
        }
    }

    protected function updateUser(Request $request, $user_id)
    {
        try {
            DB::table('users')->where('user_id', $user_id)->update([
                'name'      => $request->name,
                'class_id'  => $request->class_id
            ]);

            return back()->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            return back()->with('error', 'Data gagal diperbarui');
        }
    }

    protected function deleteUser($user_id)
    {
        try {
            DB::table('users')->where('user_id', $user_id)->delete();

            return back()->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return back()->with('error', 'Data gagal diperbarui');
        }
    }

    protected function importUser(Request $request)
    {
        $file = $request->file('excel');
        $level = $request->level_id;
        $this->validate($request, [
            'excel' => 'required|mimes:xls,xlsx'
        ]);
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        ReadExcel::readUsers($rows, $level);

        return back()->with('success', 'Berhasil menambahkan data.');
    }
}
