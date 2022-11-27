<?php

namespace App\Http\Controllers;


use App\Jobs\ProcessReport;


class PDFController extends Controller
{

    public function __invoke()
    {
        ProcessReport::dispatch();

        return redirect(route('completed-challenge.index'));
    }
}
