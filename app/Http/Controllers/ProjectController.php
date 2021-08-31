<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Project;
use Image;
use App\Models\ProjectCategories;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->year) {
            $qry = Project::join('project_categories', 'projects.id_category', '=', 'project_categories.id')->where('projects.year', $request->year)->orderBy('projects.id', 'DESC');
            $selected = $request->year;
        } else {
            $conf = Config::orderBy('created_at', 'DESC')->get()->first();
            $selected = $conf->year;
            $qry = Project::join('project_categories', 'projects.id_category', '=', 'project_categories.id')->where('year', $conf->year)->orderBy('projects.id', 'DESC');
        }
        $categories = ProjectCategories::all();
        return view('administrator/projects', ['data' => $qry->get(['projects.*', 'project_categories.name as name']), 'categories' => $categories, 'years' => Project::select('year')->groupBy('year')->get(), 'selected' => $selected]);
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
            'category' => 'required',
            // 'thumbnail' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'url_youtube' => 'required',
            'year' => 'required',
        ]);

        $image = $request->file('thumbnail');
        $imgName = time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(480, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('/uploaded').'/'.$imgName, 60);
        //Image::make($image)->save(public_path('/uploaded').'/'.$imgName, 55);
   
        if (Project::create([
            'id_category' => $request->category,
            'thumbnail' => $imgName,
            'title' => $request->title,
            'year' => $request->year,
            'desc' => $request->desc,
            'url_youtube' => $request->url_youtube,
            'url_gmeet' => $request->url_gmeet,
        ])) {
            $request->session()->flash('success', 'Berhasil Tambah Data');
            if ($request->query('add-another') == 'true') {
                $request->session()->flash('add-another', 'true');
            }
        } else {
            $request->session()->flash('error', 'Gagal Tambah Data');
        }
        return redirect('administrator/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Request $request)
    {
        if ($request->project) {
            $qry = Project::where('id', $request->project);
            $categories = ProjectCategories::all();
            return view('administrator/project-edit', ['data' => $qry->get()->first(), 'categories' => $categories]);
        } else {
            return abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'id' => 'required',
            'category' => 'required',
            // 'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'thumbnail' => 'required',
            'title' => 'required',
            'url_youtube' => 'required',
            'year' => 'required',
        ]);
        $fUpdate = [
            'id_category' => $request->category,
            // 'thumbnail' => $request->thumbnail,
            'title' => $request->title,
            'year' => $request->year,
            'desc' => $request->desc,
            'url_youtube' => $request->url_youtube,
            'url_gmeet' => $request->url_gmeet,
        ];
        if ($request->file('thumbnail')) {
            $request->validate([
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $image = $request->file('thumbnail');
            $imgName = time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/uploaded').'/'.$imgName, 60);
            unlink(public_path('/uploaded').'/'.$request->thumbnailtemp);
            $fUpdate['thumbnail'] =  $imgName;
        }
        
        $get = $project->find($request->id);
        if ($get->update($fUpdate)) {
            $request->session()->flash('success', 'Berhasil Edit Data');
        } else {
            $request->session()->flash('error', 'Gagal Edit Data');
        }
        return redirect('administrator/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        $get = $project->find($request->query('project'));
        if ($get->delete()) {
            $request->session()->flash('success', 'Berhasil Hapus Data');
        } else {
            $request->session()->flash('error', 'Gagal Hapus Data');
        }
        return redirect('administrator/projects');
    }
}
