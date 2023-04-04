<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateStatus;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    private $repository;

    public function __construct(Status $status)
    {
        $this->repository = $status;

      // $this->middleware(['can:status']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = $this->repository->latest()->paginate();

        return view('admin.pages.status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateStatus  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateStatus $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$status = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.status.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$status = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        return view('admin.pages.status.edit', compact('status'));
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\StoreUpdateStatus  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateStatus $request, $id)
    {
        if (!$status = $this->repository->find($id)) {
            return redirect()->back();
        }

        $status->update($request->all());

        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$status = $this->repository->find($id)) {
            return redirect()->back();
        }

        $status->delete();

        return redirect()->route('status.index');
    }


    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $status = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->Where('name', 'LIKE', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.status.index', compact('status', 'filters'));
    }  
}
