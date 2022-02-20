<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartController extends Controller
{
    public function index()
    {
        $data = DB::table('parts')->get();

        $parts = [];
        $counter = 0;

        foreach ($data as $d) {
            $kategori_nama = '';
            $kategori = Kategori::where('id', $d->kategori_id)->first();
            if ($kategori) {
                $kategori_nama = $kategori->nama;
            }
            array_push($parts, (object)['id' => $d->id, 'kategori' => $kategori_nama, 'nama' => $d->nama, 'harga' => $d->harga]);
            $counter = $d->id + 1;
        }

        return view('admin', ['parts' => $parts, 'counter' => $counter]);
    }

    public function update(Request $request)
    {
        for ($id = 0; $id < $request->get('counter'); $id++) {
            if ($request->exists('part-' . $id)) {
                $kategori_nama = $request->get('kategori-' . $id);
                $kategori = Kategori::where('nama', $kategori_nama)->first();
                if (!$kategori) {
                    $kategori = new Kategori();
                    $kategori->nama = $kategori_nama;
                    $kategori->save();
                }

                $part = Part::where('id', $id)->first();
                if (!$part) {
                    $part = new Part();
                    $part->id = $id;
                }
                $part->nama = $request->get('part-' . $id);
                $part->harga = $request->get('harga-' . $id);
                $part->kategori_id = $kategori->id;
                $part->save();
            }
            else {
                $part = Part::where('id', $id)->first();
                if ($part) $part->delete();
            }
        }

        return redirect()->route('admin');
    }
}
