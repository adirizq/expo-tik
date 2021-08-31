<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Project;
use App\Models\ProjectCategories;
use App\Models\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpoController extends Controller
{
    public function index() {
        // $categories = ProjectCategories::all();
        $conf = Config::orderBy('created_at', 'DESC')->get()->first();
        $categories = Project::select('projects.id_category as id', 'project_categories.name as name')->join('project_categories', 'projects.id_category', '=', 'project_categories.id')->where('projects.year', $conf->year)->groupBy('projects.id_category', 'project_categories.name')->get();
        $projects = Project::where('year', $conf->year)->get();
        return view('main', ['categories' => $categories, 'projects' => $projects, 'conf' => $conf]);
    } 

    public function dashboard(Request $request) {
        if ($request->project) {
            $qry = Votes::select('votes.*', 'projects.title', 'projects.year')->join('projects', 'votes.id_project', '=', 'projects.id')->where('votes.id_project', $request->project)->orderBy('votes.created_at', 'DESC')->get();
            return view('administrator/dashboard', ['data' => $qry]);
        } else {
            $tCategories = ProjectCategories::count();
            $years = Project::select('year')->groupBy('year')->get();
            if ($request->year) {
                $tProjects = Project::where('projects.year', $request->year);
                $tVotes = Votes::where(DB::raw('YEAR(created_at)'), '=', $request->year);
                $qry = Votes::select('projects.*', 'project_categories.name', DB::raw('COUNT(votes.id_project) AS votes'))
                ->join('projects', 'projects.id', '=', 'votes.id_project')
                ->join('project_categories', 'projects.id_category', '=', 'project_categories.id')
                ->where('projects.year', $request->year)
                ->orderBy('projects.id', 'DESC')
                ->groupBy('id_project');
                $selected = $request->year;
            } else {
                $conf = Config::orderBy('created_at', 'DESC')->get()->first();
                $selected = $conf->year;
                $tProjects = Project::where('projects.year', $selected);
                $tVotes = Votes::where(DB::raw('YEAR(created_at)'), '=', $selected);
                $qry = Votes::select('projects.*', 'project_categories.name', DB::raw('COUNT(votes.id_project) AS votes'))
                ->join('projects', 'projects.id', '=', 'votes.id_project')
                ->join('project_categories', 'projects.id_category', '=', 'project_categories.id')
                ->where('projects.year', $selected)
                ->orderBy('projects.id', 'DESC')
                ->groupBy('id_project');
            }
            return view('administrator/dashboard', ['dataProjects' => $qry->get(), 'tProjects' => $tProjects->count(), 'years' => $years, 'tVotes' => $tVotes->count(), 'tCategories' => $tCategories, 'selected' => $selected]);
        }
    }
    
    public function expoAdminEdit() {
        return view('administrator/expo-admin-edit', ['conf' => Config::orderBy('created_at', 'DESC')->get()->first()]);
    }

    public function expoConfUpdate(Request $request) {
        $request->validate([
            'year' => 'required',
            'duevote' => 'required',
            'evdate' => 'required',
        ]);
        DB::table('config')->update(['year' => $request->year, 'duevote' => $request->duevote, 'eventdate' => $request->evdate]);
        $request->session()->flash('success', 'Berhasil Edit Data');
        return redirect('administrator/edit');
    }

    public function expoAdminUpdate(Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
        ]);
        if (!$request->password) {
            DB::table('users')->update(['name' => $request->name, 'username' => $request->username]);
            $request->session()->flash('success', 'Berhasil Edit Data');
        } else {
            $request->validate([
                'password' => 'required|min:6',
            ]);
            DB::table('users')->update(['name' => $request->name, 'username' => $request->username, 'password' => bcrypt($request->password)]);
            $request->session()->flash('success', 'Berhasil Edit Data');
        }
        return redirect('administrator/edit');
    }
}
