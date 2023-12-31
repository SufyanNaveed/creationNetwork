<?php 

namespace App\Repositories;

class BaseRepository {
    protected $model;
    public function __construct($model) {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}