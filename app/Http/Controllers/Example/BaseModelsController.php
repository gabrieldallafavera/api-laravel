<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;

abstract class BaseModelsController
{
    protected $class;
    protected $per_page = 20;

    public function index(Request $request)
    {
        try {
            //É necessário passar 2 parametros, (url...)?page=1&per_page=5
            return response($this->class::paginate($request->per_page ?? $this->per_page), 200);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }

    public function store(Request $request)
    {
        try {
            return response($this->class::create($request->all()), 201);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }

    public function show(int $id)
    {
        try {
            $resource = $this->class::find($id);
            if (is_null($resource)) {
                return response("Id $id não encontrado", 204);
            }
            return response($resource, 200);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            $resource = $this->class::find($id);
            if (is_null($resource)) {
                return response("Id $id não encontrado", 404);
            }
            $this->class->fill($request->all());
            return response($this->class->save(), 200);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            if ($this->class::destroy($id) === 0) {
                return response("Id $id não encontrado", 404);
            }
            return response("Removido com sucesso", 204);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }
}
