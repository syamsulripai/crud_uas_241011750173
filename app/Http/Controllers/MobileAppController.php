<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobileApp;
use Barryvdh\DomPDF\Facade\Pdf;

class MobileAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $mobileApps = MobileApp::all();
    return view('mobile_apps.index', compact('mobileApps'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    return view('mobile_apps.create');
}
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'nama_aplikasi' => 'required',
        'developer' => 'required',
        'versi' => 'required',
        'deskripsi' => 'required',
    ],[
        'gambar.required' => 'Gambar wajib diisi.',
        'gambar.image' => 'File harus berupa gambar.',
        'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
        'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        'nama_aplikasi.required' => 'Nama aplikasi wajib diisi.',
        'developer.required' => 'Developer wajib diisi.',
        'versi.required' => 'Versi wajib diisi.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
    ]);

    $gambar = time().'.'.$request->gambar->extension();

    $request->gambar->move(public_path('uploads'), $gambar);

    MobileApp::create([
        'gambar' => $gambar,
        'nama_aplikasi' => $request->nama_aplikasi,
        'developer' => $request->developer,
        'versi' => $request->versi,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()
        ->route('mobile.index')
        ->with('success', 'Data aplikasi berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $mobile = MobileApp::findOrFail($id);
    return view('mobile_apps.show', compact('mobile'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $mobile = MobileApp::findOrFail($id);
    return view('mobile_apps.edit', compact('mobile'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MobileApp $mobile)
{
    $request->validate([
        'nama_aplikasi' => 'required',
        'developer' => 'required',
        'versi' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ],[
        'nama_aplikasi.required' => 'Nama aplikasi wajib diisi.',
        'developer.required' => 'Developer wajib diisi.',
        'versi.required' => 'Versi wajib diisi.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'gambar.image' => 'File harus berupa gambar.',
        'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
        'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
    ]);

    $data = [
        'nama_aplikasi' => $request->nama_aplikasi,
        'developer' => $request->developer,
        'versi' => $request->versi,
        'deskripsi' => $request->deskripsi,
    ];

    if ($request->hasFile('gambar')) {

        // Hapus gambar lama jika ada
        if (file_exists(public_path('uploads/' . $mobile->gambar))) {
            unlink(public_path('uploads/' . $mobile->gambar));
        }

        $gambar = time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('uploads'), $gambar);

        $data['gambar'] = $gambar;
    }

    $mobile->update($data);

    return redirect()
        ->route('mobile.index')
        ->with('success', 'Data aplikasi berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(MobileApp $mobile)
{
    if (file_exists(public_path('uploads/' . $mobile->gambar))) {
        unlink(public_path('uploads/' . $mobile->gambar));
    }

    $mobile->delete();

    return redirect()
        ->route('mobile.index')
        ->with('success', 'Data aplikasi berhasil dihapus.');
}

public function exportPdf()
{
    $mobileApps = MobileApp::all();

    $pdf = Pdf::loadView('pdf.mobilepdf', compact('mobileApps'));

    return $pdf->download('mobile_apps.pdf');
}

public function frontend()
{
    $mobileApps = MobileApp::all();

    return view('frontend.index', compact('mobileApps'));
}
}
