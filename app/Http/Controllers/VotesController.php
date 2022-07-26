<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Project;
use App\Models\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $years = Project::select('year')->groupBy('year')->get();
        if ($request->year) {
            $selected = $request->year;
            $qry = Votes::select('votes.*', 'projects.title', 'projects.year')->join('projects', 'votes.id_project', '=', 'projects.id')->where('year', $request->year)->orderBy('votes.created_at', 'DESC')->get();
        } else {
            $conf = Config::orderBy('created_at', 'DESC')->get()->first();
            $selected = $conf->year;
            $qry = Votes::select('votes.*', 'projects.title')->join('projects', 'votes.id_project', '=', 'projects.id')->where('year', $selected)->orderBy('votes.created_at', 'DESC')->get();
        }
        return view('administrator/votes', ['data' => $qry, 'years' => $years, 'selected' => $selected]);
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
            'vname' => 'required',
            'vpk' => 'required',
            'vemail' => 'required'
        ]);
        $conf = Config::orderBy('created_at', 'DESC')->get()->first()->duevote;
        if (date('Y-m-d') <= $conf) {
            $CHECK = Votes::where('ipaddress',  $request->ip())->where('id_project', Crypt::decrypt($request->vpk))->count();
            if ($CHECK > 0) {
                return response([
                    'status' => true,
                    'message' => 'exists',
                    'i' => 'Anda sudah melakukan Vote'
                ], 201);
            } else {
                if (Votes::create([
                    'id_project' => Crypt::decrypt($request->vpk),
                    'name' => $request->vname,
                    'ipaddress' => $request->ip(),
                    'email' => $request->vemail,
                ])) {
                    return response([
                        'status' => true,
                        'message' => 'success',
                        'i' => 'Anda sudah melakukan Vote'
                    ], 201);
                } else {
                    return response([
                        'status' => false,
                        'message' => 'failed',
                        'i' => 'Anda sudah melakukan Vote'
                    ], 400);
                }
            }
        } else {
            return response([
                'status' => true,
                'message' => 'due',
                'i' => 'Batas Vote : '.date('d F Y', strtotime($conf))
            ], 201);
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function show(Votes $votes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function edit(Votes $votes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votes $votes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Votes $votes)
    {
        $get = $votes->find($request->query('vote'));
        if ($get->delete()) {
            $request->session()->flash('success', 'Berhasil Hapus Data');
        } else {
            $request->session()->flash('error', 'Gagal Hapus Data');
        }
        return redirect('administrator/votes');
    }


    public function showVote($encId) {
        $id = Crypt::decrypt($encId);
        $project = Project::findOrFail($id);

        return view('showVote', [
            'project' => $project
        ]);
    }

    public function downloadQRCode(Request $request, $type) {
        $request->validate([
            'vpk' => 'required',
        ]);

        $headers    = array('Content-Type' => ['png','svg','eps']);
        $type       = $type == 'jpg' ? 'png' : $type;
        $image      = \QrCode::format($type)
                    ->size(300)->generate($request->vpk);

        $imageName = 'qr-code';
        if ($type == 'svg') {
            $svgTemplate = new \SimpleXMLElement($image);
            $svgTemplate->registerXPathNamespace('svg', 'http://www.w3.org/2000/svg');
            $svgTemplate->rect->addAttribute('fill-opacity', 0);
            $image = $svgTemplate->asXML();
        }

        \Storage::disk('public')->put($imageName, $image);

        return response()->download('storage/'.$imageName, $imageName.'.'.$type, $headers);
    }
}
