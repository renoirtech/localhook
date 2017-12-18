<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

abstract class CrudController extends Controller
{
    protected $model;
    protected $method;
    protected $validation_store;
    protected $validation_update;

    public function __construct()
    {
        $this->model = new $this->model();
    }

    protected function execValidate(Request $request)
    {
        $method = $this->method . 'PrepareValidation';

        $validation = "validation_{$this->method}";

        if (method_exists($this, $method) && is_null($this->$validation)) {
            $this->$method($request);
        }

        $this->validate($request, $this->$validation);
    }

    public function index()
    {
        $result = $this->model->all();

        return $this->successResponse($result, 200);
    }

    public function show($id)
    {
        $result = $this->model->find($id);

        return $this->successResponse($result, 200);
    }

    public function store(Request $request)
    {
        $this->method = 'store';

        $this->execValidate($request);

        DB::beginTransaction();

        try {
            $result = $this->model->create($request->all());
            DB::commit();
            return $this->successResponse($result, 201);
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
        $this->method = 'update';

        $this->execValidate($request);

        DB::beginTransaction();

        try {
            $result = $this->model->find($id);
            $result->update($request->all());
            DB::commit();
            return $this->successResponse($result, 200);
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $result = $this->model->find($id);
            $result->delete();
            DB::commit();
            return $this->successResponse($result, 200);
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
