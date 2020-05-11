<?php

namespace App\Exports;

use App\Transaksi   ;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromView

{
    use Exportable;

    public function view(): View
    {
        return view('excel.users', [
            'users' =>Transaksi::all()
        ]);
    }
}
