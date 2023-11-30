<?php

namespace App\DataTables;

use App\Models\ContactInfo;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContactInfoDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('contact-info.edit', $query->id) . "' class='btn btn-success'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('contact-info.destroy', $query->id) . "' class='btn btn-danger my-2 delete-item'><i class='fas fa-trash-alt'></i></a>";

                return $editBtn . $deleteBtn;
            })
            ->addColumn('facebook', function ($query) {
                return "<a target='_blank' href='" . $query->facebook . "'><i class='fab fa-facebook'></i></a>";
            })
            ->addColumn('youtube', function ($query) {
                return "<a target='_blank' href='" . $query->youtube . "'><i class='fa-brands fa-youtube'></i>";
            })
            ->addColumn('twitter', function ($query) {
                return "<a target='_blank' href='" . $query->twitter . "'><i class='fa-brands fa-twitter'></i></a>";
            })
            ->rawColumns(['phone', 'email', 'facebook', 'youtube', 'twitter', 'action'])
            ->setRowId('id');
    }


    public function query(ContactInfo $model): QueryBuilder
    {
        return $model->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('contactinfo-table')
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
            Column::make('phone'),
            Column::make('email'),
            Column::make('facebook'),
            Column::make('youtube'),
            Column::make('twitter'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }


    protected function filename(): string
    {
        return 'ContactInfo_' . date('YmdHis');
    }
}
