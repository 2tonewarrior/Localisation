<?php

namespace LaravelEnso\Localisation\app\DataTable;

use LaravelEnso\DataTable\app\Classes\TableStructure;

class LocalisationTableStructure extends TableStructure
{
    public function __construct()
    {
        $this->data = [
            'crtNo'         => __('#'),
            'tableName'     => __('Languages'),
            'actionButtons' => __('Actions'),
            'render'        => [2],
            'notSearchable' => [3, 4],
            'headerAlign'   => 'center',
            'bodyAlign'     => 'center',
            'columns'       => [
                0 => [
                    'label' => __('Display Name'),
                    'data'  => 'display_name',
                    'name'  => 'display_name',
                ],
                1 => [
                    'label' => __('Name'),
                    'data'  => 'name',
                    'name'  => 'name',
                ],
                2 => [
                    'label' => __('Flag'),
                    'data'  => 'flag',
                    'name'  => 'flag',
                ],

                3 => [
                    'label' => __('Created At'),
                    'data'  => 'created_at',
                    'name'  => 'created_at',
                ],
                4 => [
                    'label' => __('Updated At'),
                    'data'  => 'updated_at',
                    'name'  => 'updated_at',
                ],
            ],
        ];
    }
}
