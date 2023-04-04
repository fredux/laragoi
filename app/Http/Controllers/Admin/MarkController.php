<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMark;
use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    private $repository;

    public function __construct(Mark $mark)
    {
        $this->repository = $mark;

      // $this->middleware(['can:mark']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = $this->repository->latest()->paginate();

        return view('admin.pages.marks.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.marks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateMark  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMark $request)
    {
        
        $this->repository->create($request->all());
        return redirect()->route('marks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$mark = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.marks.show', compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$mark = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        return view('admin.pages.marks.edit', compact('mark'));
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\StoreUpdatemark  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMark $request, $id)
    {
        
        if (!$mark = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        $mark->update($request->all());

        return redirect()->route('marks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$mark = $this->repository->find($id)) {
            return redirect()->back();
        }

        $mark->delete();

        return redirect()->route('marks.index');
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

        $marks = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->Where('name', 'LIKE', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.marks.index', compact('marks', 'filters'));
    }  

}
