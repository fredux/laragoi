<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSectors;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    private $repository;

    public function __construct(Sector $sector)
    {
        $this->repository =$sector;

      // $this->middleware(['can:sector']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sectors = $this->repository->latest()->paginate();

        return view('admin.pages.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateSectors  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateSectors $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('sectors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$sector = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.sectors.show', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$sector = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        return view('admin.pages.sectors.edit', compact('sector'));
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\StoreUpdateSectors  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateSectors $request, $id)
    {
        if (!$sector = $this->repository->find($id)) {
            return redirect()->back();
        }

       $sector->update($request->all());

        return redirect()->route('sectors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$sector = $this->repository->find($id)) {
            return redirect()->back();
        }

       $sector->delete();

        return redirect()->route('sectors.index');
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

       $sectors = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->Where('name', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");

                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.sectors.index', compact('sectors', 'filters'));
    }  

}


