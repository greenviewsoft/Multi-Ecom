<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DateTime;


class ReportController extends Controller
{
    



    public function ReportView(){

  return view('backend.report.report_view');
    } // End Method


    public function SearchByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formateDate = $date->format('d F Y'); 

        $orders = Order::where('order_date',$formateDate)->latest()->get();
        return view('backend.report.report_by_date', compact('orders','formateDate'));
    }// End Method
}
