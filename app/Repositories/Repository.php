<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use App\Http\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    protected $model;

    /**
     * Repository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function index()
    {
        // TODO: Implement index() method.
        return $this->model->orderBy('id','desc')->paginate(PAGINATION_COUNT);//get all data
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
        return $this->model->create($data);//create data
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
        $record = $this->model->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        return $this->model->destroy($id);
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        return $record = $this->model->find($id);
    }


    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

}
