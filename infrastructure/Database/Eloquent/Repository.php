<?php 

namespace Infrastructure\Database\Eloquent;

use Infrastructure\Database\Traits\EloquentBuilderTrait;
use Illuminate\Support\Facades\DB;

abstract class Repository
{
    use EloquentBuilderTrait;

    protected $model;

    protected $sortProperty = null;

    // 0 = ASC, 1 = DESC
    protected $sortDirection = 0;

    abstract protected function getModel();

    final public function __construct()
    {
        $this->model = $this->getModel();
    }

    public $dirty = [];
    public $originalData;

    public function create(array $data)
    {
        $model = $this->getModel();

        $model->fill($data);
        $model->save();

        return $model;
    }

    public function update($model, array $data)
    {
        $model->fill($data);
        $this->originalData = $model->getOriginal();
        $this->dirty = $model->getDirty();
        $model->save();
        return $model;
    }

    // create not using mass assignment
    public function createNotUsingMassAssignment(array $data)
    {
        $invoice = $this->getModel();

        foreach($data as $key => $value) {
            $invoice->{$key} = $value;
        }
        $invoice->save();
        return $invoice;
    }

    // update not using mass assignment
    public function updateNotUsingMassAssignment($model, array $data)
    {
        foreach($data as $key => $value) {
            $model->{$key} = $value;
        }
        $model->save();

        return $model;
    }

    public function getDataChanged() {
        $dataChange = '';
        if($this->dirty) {
            $dataChange = 'Nội dung thay đổi: ';
            foreach($this->dirty as $key => $value) {
                $this->originalData[$key] = (empty($this->originalData[$key])) ? '' : $this->originalData[$key];
                if ($key == 'json_data') {
                    $json_old = '{"';
                    if ($this->originalData[$key]) {
                        foreach ($this->originalData[$key] as $key1 => $value1) {
                            $json_old .= $key1 . '":"' . $value1 ;
                        }
                    }
                    $json_old .= '"}';
                    $dataChange .= $key . ': ' . $json_old . ' => ' . $value . ', ';
                } else {
                    $dataChange .= $key . ': ' . $this->originalData[$key] . ' => ' . $value . ', ';
                }
            }
        }
        return trim($dataChange, ', ');
    }

	/**
     * Get resources by a where clause
     * @param  string $column
     * @param  mixed $value
     * @param  array $options
     * @return Collection
     */
    public function getWhereWithPagination($column, $value, $tag = 'item', array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        $query->where($column, $value);
        $queryCount = clone $query;
        $total = $queryCount->offset(0)->limit(PHP_INT_MAX)->count();
        $meta = ['total' => $total];
        return [
            'meta' => $meta,
            $tag   =>$query->get(),
        ];
    }

    public function getWhereArrayWithPagination(array $clauses, $tag = 'item', array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        $query->where($clauses);
        $queryCount = clone $query;
        $total = $queryCount->offset(0)->limit(PHP_INT_MAX)->count();
        $meta = ['total' => $total];
        return [
            'meta' => $meta,
            $tag   =>$query->get(),
        ];
    }

    public function getWhereRaw($params, array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        $query->whereRaw($params);

        return $query->get();
    }


    //genie
     /**
     * Get all resources
     * @param  array $options
     * @return Collection
     */
    public function get(array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        return $query->get();
    }

    /**
     * Get a resource by its primary key
     * @param  mixed $id
     * @param  array $options
     * @return Collection
     */
    public function getById($id, array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        return $query->find($id);
    }

    /**
     * Get all resources ordered by recentness
     * @param  array $options
     * @return Collection
     */
    public function getRecent(array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        $query->orderBy($this->getCreatedAtColumn(), 'DESC');

        return $query->get();
    }

    /**
     * Get all resources by a where clause ordered by recentness
     * @param  string $column
     * @param  mixed $value
     * @param  array  $options
     * @return Collection
     */
    public function getRecentWhere($column, $value, array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        $query->orderBy($this->getCreatedAtColumn(), 'DESC');

        return $query->get();
    }
    
    /**
     * Get latest resource
     * @param  array $options
     * @return Collection
     */
    public function getLatest(array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        $query->orderBy($this->getCreatedAtColumn(), 'DESC');

        return $query->first();
    }

    /**
     * Get latest resource by a where clause
     * @param  string $column
     * @param  mixed $value
     * @param  array  $options
     * @return Collection
     */
    public function getLatestWhere($column, $value, array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        $query->orderBy($this->getCreatedAtColumn(), 'DESC');

        return $query->first();
    }

    /**
     * Get resources by a where clause
     * @param  string $column
     * @param  mixed $value
     * @param  array $options
     * @return Collection
     */
    public function getWhere($column, $value, array $options = [])
    {
        $query = $this->createBaseBuilder($options);
       
        $query->where($column, $value);

        return $query->get();
    }

    /**
     * Get resources by multiple where clauses
     * @param  array  $clauses
     * @param  array $options
     * @deprecated
     * @return Collection
     */
    public function getWhereArray(array $clauses, array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        $query->where($clauses);

        return $query->get();
    }

    /**
     * Get resources where a column value exists in array
     * @param  string $column
     * @param  array  $values
     * @param  array $options
     * @return Collection
     */
    public function getWhereIn($column, array $values, array $options = [])
    {
        $query = $this->createBaseBuilder($options);

        $query->whereIn($column, $values);

        return $query->get();
    }

    /**
     * Delete a resource by its primary key
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $query = $this->createQueryBuilder();

        $query->where($this->getPrimaryKey($query), $id);
        $query->delete();
    }

    /**
     * Delete resources by a where clause
     * @param  string $column
     * @param  mixed $value
     * @return void
     */
    public function deleteWhere($column, $value)
    {
        $query = $this->createQueryBuilder();

        $query->where($column, $value);
        $query->delete();
    }

    /**
     * Delete resources by multiple where clauses
     * @param  array  $clauses
     * @return void
     */
    public function deleteWhereArray(array $clauses)
    {
        $query = $this->createQueryBuilder();

        $query->whereArray($clauses);
        $query->delete();
    }

    /**
     * Creates a new query builder with Optimus options set
     * @param  array $options
     * @return Builder
     */
    protected function createBaseBuilder(array $options = [])
    {
        $query = $this->createQueryBuilder();
        $this->applyResourceOptions($query, $options);
  
        if (empty($options['sort'])) {
            $this->defaultSort($query, $options);
        }

        return $query;
    }

    /**
     * Creates a new query builder
     * @return Builder
     */
    protected function createQueryBuilder()
    {
        return $this->model->newQuery();
    }

    /**
     * Get primary key name of the underlying model
     * @param  Builder $query
     * @return string
     */
    protected function getPrimaryKey(Builder $query)
    {
        return $query->getModel()->getKeyName();
    }

    /**
     * Order query by the specified sorting property
     * @param  Builder $query
     * @param  array  $options
     * @return void
     */
    protected function defaultSort($query, $options = [])
    {
        if (isset($this->sortProperty)) {
            $direction = $this->sortDirection === 1 ? 'DESC' : 'ASC';
            $query->orderBy($this->sortProperty, $direction);
        }
    }

    /**
     * Get the name of the "created at" column.
     * More info to https://laravel.com/docs/5.4/eloquent#defining-models
     * @return string
     */
    protected function getCreatedAtColumn()
    {
        $model = $this->model;
        return ($model::CREATED_AT) ? $model::CREATED_AT : 'created_at';
    }

}