<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tb_m_projects = Project::all();
        $tb_m_clients = Client::all();
        $keyword = $request->input('keyword');
        $selectedClient = $request->input('pilclient');
        $selectedStatus = $request->input('pilstatus');

        $filteredProjects = Project::when($keyword, function ($query) use ($keyword) {
            $query->where('project_name', 'like', "%$keyword%")
                ->orWhere('project_status', 'like', "%$keyword%")
                ->orWhereHas('client', function ($subQuery) use ($keyword) {
                    $subQuery->where('client_name', 'like', "%$keyword%");
                });
        })->get();

        if ($selectedClient) {
            $tb_m_projects->where('client_id', $selectedClient);
        }

        if ($selectedStatus) {
            $tb_m_projects->where('project_status', $selectedStatus);
        }

        $tb_m_projects->transform(function ($project) {
            $project->project_start = Carbon::parse($project->project_start)->format('d M Y');
            $project->project_end = Carbon::parse($project->project_end)->format('d M Y');
            return $project;
        });

    return view('project.index', compact('tb_m_projects', 'tb_m_clients', 'filteredProjects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tb_m_clients = Client::all();
        return view('project.create', compact('tb_m_clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'client_id' => 'required|integer',
            'project_start' => 'required|date',
            'project_end' => 'required|date',
            'project_status' => 'required',
        ]);

        $tb_m_projects = new Project;

        $tb_m_projects->project_name = $request->input('project_name');
        $tb_m_projects->client_id = $request->input('client_id');
        $tb_m_projects->project_start = $request->input('project_start');
        $tb_m_projects->project_end = $request->input('project_end');
        $tb_m_projects->project_status = $request->input('project_status');

        $tb_m_projects->save();
        return redirect('/project')->with('success', 'Project berhasil ditambahkan.');
        // Redirect atau melakukan tindakan lainnya setelah penyimpanan

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tb_m_projects = Project::find($id);
        $tb_m_clients = Client::all();

        return view('project.edit', compact('tb_m_projects', 'tb_m_clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required',
            'client_id' => 'required|integer',
            'project_start' => 'required|date',
            'project_end' => 'required|date',
            'project_status' => 'required',
        ]);

        $tb_m_project = Project::find($id);
        $tb_m_project->project_name = $request->input('project_name');
        $tb_m_project->client_id = $request->input('client_id');
        $tb_m_project->project_start = $request->input('project_start');
        $tb_m_project->project_end = $request->input('project_end');
        $tb_m_project->project_status = $request->input('project_status');
        $tb_m_project->save();

        return redirect('/project')->with('success', 'Project berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
    public function deleteSelected(Request $request)
    {
        $selectedProjects = $request->input('selected_projects');

        if ($selectedProjects) {
            Project::whereIn('id', $selectedProjects)->delete();

            return redirect()->back()->with('success', 'Selected projects deleted successfully.');
        } else {
            return redirect()->back()->withErrors('No projects selected for deletion.');
        }
    }
}
