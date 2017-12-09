<?php

namespace App\Http\Controllers;

use App\Entities\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $kriterium = Kriteria::paginate(10); 

            return response()->json($kriterium);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kriteria' => 'required',
            'bobot' => 'required',
        ]);

        $kriterium = new Kriteria();
        $kriterium->kriteria = $request->kriteria;
        $kriterium->bobot = $request->bobot;
        $kriterium->save();

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Kriteria  $kriterium
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriterium)
    {
        return response()->json($kriterium);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Kriteria  $kriterium
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriterium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Kriteria  $kriterium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriterium)
    {
        $this->validate($request, [
            'kriteria' => 'required',
            'bobot' => 'required',
        ]);

        $kriterium->kriteria = $request->kriteria;
        $kriterium->bobot = $request->bobot;
        $kriterium->save();

        return response()->json([
            'message' => 'Data Berhasil Diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Kriteria  $kriterium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriterium)
    {
        $kriterium->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus'
        ], 201);

    }
}