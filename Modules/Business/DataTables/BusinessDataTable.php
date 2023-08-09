<?php

namespace Modules\Business\DataTables;

use Modules\Business\Entities\Business;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BusinessDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return view('business::partials.actions', compact('data'));
            });
    }

    public function query(Business $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('business-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-md-3'l><'col-md-5 mb-2'B><'col-md-4'f>> .
                                        'tr' .
                                        <'row'<'col-md-5'i><'col-md-7 mt-2'p>>")
            ->orderBy(6)
            ->buttons(
                Button::make('excel')
                    ->text('<i class="bi bi-file-earmark-excel-fill"></i> Excel'),
                Button::make('print')
                    ->text('<i class="bi bi-printer-fill"></i> Print'),
                Button::make('reset')
                    ->text('<i class="bi bi-x-circle"></i> Reset'),
                Button::make('reload')
                    ->text('<i class="bi bi-arrow-repeat"></i> Reload')
            );
    }

    protected function getColumns()
    {
        return [
            Column::make('location_id')
                ->className('text-center align-middle'),

            Column::make('name')
                ->className('text-center align-middle'),

            Column::make('address')
                ->className('text-center align-middle'),

            Column::make('city')
                ->className('text-center align-middle'),

            Column::make('zip_code')
                ->className('text-center align-middle'),

            Column::make('country')
                ->className('text-center align--middle'),

            Column::make('mobile')
                ->className('text-center align-middle'),

            Column::make('email')
                ->className('text-center align-middle'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->className('text-center align-middle'),

            Column::make('created_at')
                ->visible(false),

            Column::make('updated_at')
                ->visible(false)
        ];
    }

    protected function filename()
    {
        return 'Business_' . date('YmdHis');
    }
}
