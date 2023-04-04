<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSystem;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    private $repository;

    public function __construct(System $system)
    {
        $this->repository = $system;

      // $this->middleware(['can:system']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = $this->repository->latest()->paginate();

        return view('admin.pages.system.index', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.system.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatesystem  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateSystem $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('systems.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$system = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.system.show', compact('system'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$system = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        return view('admin.pages.system.edit', compact('system'));
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\StoreUpdatesystem  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateSystem $request, $id)
    {
        if (!$system = $this->repository->find($id)) {
            return redirect()->back();
        }

        $system->update($request->all());

        return redirect()->route('systems.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$system = $this->repository->find($id)) {
            return redirect()->back();
        }

        $system->delete();

        return redirect()->route('systems.index');
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

        $systems = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->Where('name', 'LIKE', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.system.index', compact('systems', 'filters'));
    }  

}
