<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Dokumentasi API PraktikumApi",
 *      description="Satria Dava Riansa",
 *      @OA\Contact(
 *          email="email@example.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 * 
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */

class MahasiswaController extends Controller
{
    /**
    * @OA\Get(
    * path="/api/mahasiswas",
    * summary="Dapatkan daftar semua mahasiswa",
    * description="Mengembalikan daftar semua mahasiswa",
    * operationId="getMahasiswa",
    * tags={"Mahasiswa"},
    * security={{"bearerAuth":{}}},
    * @OA\Response(
    * response=200,
    * description="Daftar mahasiswa",
    * @OA\JsonContent(
    * type="array",
    * @OA\Items(ref="#/components/schemas/Mahasiswa")
    * )
    * )
    * )
    */
    public function index()
    {
        return Mahasiswa::all();
        return response()->json($mahasiswa);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dosen = Mahasiswa::create($request->all());
        return response()->json($dosen, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Mahasiswa::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dosen = Mahasiswa::findOrFail($id);
        $dosen->update($request->all());
        return response()->json($dosen, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::destroy($id);
        return response()->json(null, 204);
    }
}
