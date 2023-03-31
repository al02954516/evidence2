<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Status;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{

    public function __construct()
{
    $this->middleware('auth')->except(['show', 'search']);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate();

        return view('order.index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * $orders->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $customers = Customer::all();
        $statuses = Status::all();
        return view('order.create', compact('order', 'customers','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        request()->validate(Order::$rules);

        $order = Order::create($request->all());

        return redirect()->route('order.index')
            ->with('success', 'Order created successfully.');
            if ($request->hasFile('loaded_photo')) {
                $imagePath = $request->file('loaded_photo')->store('public');
                $imageName = basename($imagePath);
                $order->loaded_photo = $imageName;
            }
            
            if ($request->hasFile('delivered_photo')) {
                $imagePath = $request->file('delivered_photo')->store('storage\app/public');
                $imageName = basename($imagePath);
                $order->delivered_photo = $imageName;
            }
        
            $order->save();
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $order = Order::find($id);
    
    if ($order) {
        return view('order.show', compact('order'));
    } else {
        return view('order.notfound');
    }
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $customers = Customer::all();
        $statuses = Status::all();
        return view('order.edit', compact('order', 'customers','statuses'));
    }

    public function search(Request $request)
    {
        $invoice_number = $request->input('invoice_number');
        $order = Order::where('invoice_number', $invoice_number)->first();
    
        if (!$order) {
            return view('order.notfound')->withErrors(['invoice_number' => 'Invoice number not found']);
        }
        
        $statuses = Status::all();
        $order_status = $statuses;
    
        if ($order_status == 'Delivered') {
            $photo = $order_status->photo;
            return view('order.show')->with(['order' => $order, 'photo' => $photo]);
        } elseif ($order_status == 'In Process') {
            $process = $order_status->process;
            $date = $order_status->updated_at->format('d/m/Y');
            return view('order.show')->with(['order' => $order, 'process' => $process, 'date' => $date]);
        } else {
            return view('order.show')->with('order', $order);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        request()->validate(Order::$rules);

        $order->update($request->all());

        return redirect()->route('order.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }

    public function getStatusName($status_id)
{
    if ($status_id == 1) {
        return "Ordered";
    } elseif ($status_id == 2) {
        return "In process";
    } elseif ($status_id == 3) {
        return "En route";
    } elseif ($status_id == 4) {
        return "Delivered";
    } else {
        return "";
    }
}


}
