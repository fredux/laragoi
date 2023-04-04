<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePhone;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    private $repository;

    public function __construct(Phone $phone)
    {
        $this->repository = $phone;

      // $this->middleware(['can:phone']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = $this->repository->latest()->paginate();

        return view('admin.pages.phones.index', compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePhone  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePhone $request)
    {
        
        $this->repository->create($request->all());
        return redirect()->route('phones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$phone = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.phones.show', compact('phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$phone = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        return view('admin.pages.phones.edit', compact('phone'));
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\StoreUpdatephone  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePhone $request, $id)
    {
        
        if (!$phone = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        $phone->update($request->all());

        return redirect()->route('phones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$phone = $this->repository->find($id)) {
            return redirect()->back();
        }

        $phone->delete();

        return redirect()->route('phones.index');
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

        $phones = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->Where('fone', 'LIKE', "%{$request->filter}%");
                                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.phones.index', compact('phones', 'filters'));
    }  

}
