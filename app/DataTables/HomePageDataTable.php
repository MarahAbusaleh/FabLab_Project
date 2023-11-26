<?php

namespace App\DataTables;

use App\Models\HomePage;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HomePageDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $btns = "<div class='btn-group mr-3 mb-4' role='group' aria-label='Basic example'>
                    <a href='" . route('home-page.edit', $query->id) . "' type='button' class='btn btn-success'><i class='far fa-edit'></i></a>
                    <a href='" . route('home-page.destroy', $query->id) . "' type='button' class='btn btn-danger delete-item'><i class='fas fa-trash-alt'></i></a>
                </div>";
                return $btns;
            })
            ->addColumn('media', function ($query) {
                if ($query->mediaType == 'image')
                    return $img = "<img width='200px' src='" . asset($query->media) . "'></img>";
                elseif ($query->mediaType == 'video')
                    return $video = "<video width='200px' controls><source src='" . asset($query->media) . "' type='video/mp4'>Your browser does not support the video tag.</video>";
            })
            ->rawColumns(['media', 'action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HomePage $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HomePage $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('homepage-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
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

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('media'),
            Column::make('mediaType'),
            Column::make('text'),
            Column::make('header'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'HomePage_' . date('YmdHis');
    }
}
