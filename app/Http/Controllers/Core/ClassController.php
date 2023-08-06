<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\ClassUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    protected function showClass()
    {
        $data = [
            'title'     => 'Kelas',
            'id_page'   => null,
            'classes'   => ClassUser::all(),
        ];

        return view('core.class', $data);
    }

    protected function createClass(Request $request)
    {
        try {
            DB::table('class_user')->insert([
                'class_name'    => $request->class_name
            ]);

            return back()->with('success', 'Berhasil membuat data');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal membuat data. Pastikan nama kelas tidak duplikat');
        }
    }

    protected function updateClass(Request $request, $class_id)
    {
        try {
            DB::table('class_user')->where('class_id', $class_id)->update([
                'class_name'    => $request->class_name
            ]);

            return back()->with('success', 'Data berhasil diperbarui');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal diperbarui');
        }
    }

    protected function deleteClass($class_id)
    {
        try {
            DB::table('class_user')->where('class_id', $class_id)->delete();
            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
}
