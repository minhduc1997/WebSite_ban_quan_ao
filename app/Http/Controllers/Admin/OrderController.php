<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function detail_order()
    {
        return view("backend.order.detailorder");
    }
    public function list_order()
    {
        return view("backend.order.order");
    }
    public function process_order()
    {
        return view("backend.order.processed");
    }
}
