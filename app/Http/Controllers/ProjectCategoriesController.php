<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategories;
use Illuminate\Http\Request;

class ProjectCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qry = ProjectCategories::all();
        return view('administrator/project-categories', ['data' => $qry]);
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
        $request->validate([
            'name' => 'required',
        ]);
        if (ProjectCategories::create(['name' => $request->name])) {
            $request->session()->flash('success', 'Berhasil Tambah Data');
        } else {
            $request->session()->flash('error', 'Gagal Tambah Data');
        }
        return redirect('administrator/project-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectCategories  $projectCategories
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectCategories $projectCategories)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectCategories  $projectCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectCategories $projectCategories, Request $request)
    {
        if ($request->category) {
            $qry = ProjectCategories::where('id', $request->category);
            return view('administrator/project-category-edit', ['data' => $qry->get()->first()]);
        } else {
            return abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectCategories  $projectCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectCategories $projectCategories)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);
        $get = $projectCategories->find($request->id);
        if ($get->update(['name' => $request->name])) {
            $request->session()->flash('success', 'Berhasil Edit Data');
        } else {
            $request->session()->flash('error', 'Gagal Edit Data');
        }
        return redirect('administrator/project-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectCategories  $projectCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProjectCategories $projectCategories)
    {
        $get = $projectCategories->find($request->query('category'));
        if ($get->delete()) {
            $request->session()->flash('success', 'Berhasil Hapus Data');
        } else {
            $request->session()->flash('error', 'Gagal Hapus Data');
        }
        return redirect('administrator/project-categories');
    }
}
