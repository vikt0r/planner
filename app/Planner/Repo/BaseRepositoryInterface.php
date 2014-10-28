<?php namespace Bazna\Repo;


interface BaseRepositoryInterface
{
    public function whatErrors();

    public function get($id);

    public function getWhere($column, $value, array $related = null);

    public function update(array $data);

    public function delete($id);

    public function deleteWhere($column, $value);
}
