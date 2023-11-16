<?php

namespace App\DataTables;

use App\Models\FeaturesPage;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FeaturesDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $btns = "<div class='btn-group mr-3 mb-4' role='group' aria-label='Basic example'>
                    <a href='" . route('features.edit', $query->id) . "' type='button' class='btn btn-success'><i class='far fa-edit'></i></a>
                    <a href='" . route('features.destroy', $query->id) . "' type='button' class='btn btn-danger delete-item'><i class='fas fa-trash-alt'></i></a>
                </div>";
                return $btns;
            })
            ->addColumn('mainImage', function ($query) {
                return "<img width='100px' src='" . asset($query->mainImage) . "'></img>";
            })

            ->rawColumns(['action', 'mainImage'])
            ->setRowId('id');
    }


    public function query(FeaturesPage $model): QueryBuilder
    {
        return $model->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('features-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }


    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('mainImage'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }


    protected function filename(): string
    {
        return 'Features_' . date('YmdHis');
    }
}
