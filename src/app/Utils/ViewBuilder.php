<?php

namespace App\Utils;

class ViewBuilder
{

    protected $view = null;
    protected $model = null;
    protected $data = null;
    protected $mime = null;
    protected $vars = null;
    protected $columns = null;
    protected $pagination;
    protected $page = null;
    protected $limit = null;
    protected $query = null;
    protected $options = null;

    public function __construct()
    {
        $this->view = 'pages.list.index';
        $this->data = collect();
        $this->vars = collect();
        $this->columns = collect();
        $this->options = collect();

    }

    public function setQuery($query){
        $this->query = $query;
        return $this;
    }

    public function setLimitOptions($limit_options){
        $this->limit_options = $limit_options;
        return $this;
    }
    public function setOptions($opts)
    {
        $this->options = collect($opts);
        return $this;
    }

    public function setColumns($columns)
    {
        $this->columns = collect($columns);
        return $this;
    }

    public function setVar($key, $val)
    {
        $this->vars[$key] = $val;
        return $this;
    }

    public function setView($view)
    {
        $this->view = $view;
        return $this;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function setMime($mime)
    {
        $this->$mime = $mime;
        return $this;
    }
    
    public function __invoke()
    {
        $params = [
            'data' => $this->data,
            'model' => $this->model,
            'columns' => $this->columns,
            'options' => $this->options,
            'limit_options' => $this->limit_options
        ];
        $params = array_merge($params, $this->vars->toArray());
        return view($this->view, $params);
    }
}
