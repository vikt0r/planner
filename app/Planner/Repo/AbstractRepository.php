<?php namespace Bazna\Repo;

abstract Class AbstractRepository implements BaseRepositoryInterface{

    protected $repo;
    protected $errors;


    public function whatErrors()
    {
        return $this->errors;
    }


    public function getWhere($column, $value, array $related = null)
    {
        $repoData = $this->repo->where($column, '=', $value)->select('id')->first();
        if($repoData)
            return $repoData->toArray();
        else
            return null;

    }




    public function update(array $data)
    {
        return $data;
        //$this->repo->getWhere()

    }

    public function delete($id)
    {
        $repoData = $this->repo->find($id);
        if($repoData)
        {
            $deleted = $repoData->delete($id);
            if ($deleted)
                return $deleted;
            else
                return false;
        }
        else
        {
            $this->errors['code'] = 204;
            $this->errors['evils'] = 'No Content';
            return false;
        }
    }

    public function deleteWhere($column, $value)
    {
    }


    /**
     * Retrieve article by id
     * regardless of status
     *
     * @param  int $id Article ID
     * @return stdObject object of article information
     */
    public function get($id)
    {
        $artistData = $this->repo
                ->where('id', '=', $id)
                ->first();
        if ($artistData)
            return $artistData;
        else return false;
    }



}
