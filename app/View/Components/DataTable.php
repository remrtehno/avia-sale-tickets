<?php

namespace App\View\Components;

use Error;
use Illuminate\View\Component;
use Str;

class DataTable extends Component
{
    public $config;
    public $heads;
    public $sortCells;
    public $uuid;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($config = [], $heads = null, $sortCells = [], $id = null)
    {
        if (empty($heads)) {
            return throw new Error('No specified headers');
        }

        $this->config = array_merge_recursive([
            'order' =>  empty($sortCells) ? [[0, 'desc']] : $sortCells,
            'language' => ['url' => '/lang/datatable/ru.json']
        ], $config);

        $this->heads = $heads;
        $this->uuid = $id ? $id : Str::random(4);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.data-table');
    }
}
