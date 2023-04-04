<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModelos;
use App\Models\Mark;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    protected $repository, $mark;

    public function __construct(Modelo $model, Mark $mark)
    {
        $this->repository = $model;
        $this->mark = $mark;

        //$this->middleware(['can:plans']);
    }

    public function index($id)
    {
        if (!$mark = $this->mark->where('id', $id)->first()) {
            return redirect()->back();
        }

        $models= $mark->models()->paginate();

        return view('admin.pages.marks.models.index', [
            'mark' => $mark,
            'models' => $models,
        ]);
    }

    public function create($id)
    {
        if (!$mark = $this->mark->where('id', $id)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.marks.models.create', [
            'mark' => $mark,
        ]);
    }

    public function store(StoreUpdateModelos $request, $id)
    {
        if (!$mark = $this->mark->where('id', $id)->first()) {
            return redirect()->back();
        }

        $mark->models()->create($request->all());

        return redirect()->route('modelos.mark.index', $mark->id);
    }


    public function edit($id, $idModel)
    {
        $mark = $this->mark->where(id, $id)->first();
        $model = $this->repository->find($idModel);

        if (!$mark || !$model) {
            return redirect()->back();
        }

        return view('admin.pages.marks.models.edit', [
            'mark' => $mark,
            'model' => $model,
        ]);
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->update($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }

    public function show($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }


    public function destroy($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->delete();

        return redirect()
                    ->route('details.plan.index', $plan->url)
                    ->with('message', 'Registro detalado com sucesso');
    }
}
