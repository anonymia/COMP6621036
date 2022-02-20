<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimulasiController extends Controller
{
    public function index()
    {
        $data = DB::table('kategoris')->get();

        $kategoris = [];

        foreach ($data as $d) {
            $part = Part::where('kategori_id', $d->id)->get();
            if ($part->count()) {
                $kategoris[$d->nama] = $part;
            }
        }

        return view('simulasi', ['kategoris' => $kategoris]);
    }

    public function submit(Request $request)
    {
        $total = 0;

        for ($id = 0; $id < $request->get('counter'); $id++) {
            if ($request->exists('part-' . $id)) {
                $total = $total + $request->get('part-' . $id);
            }
        }

        return view('simulasi', ['total' => $total]);
    }
}
