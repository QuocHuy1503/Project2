<?php

namespace App\Http\Controllers\admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReservationType;
use App\Models\Screening;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Reservation::latest();
        if (!empty($request->get('keyword'))){
            $orders = $orders->where('screening_id', 'like', '%'.$request->get('keyword').'%' );
        }
        $orders = $orders->paginate(10);
        return view('admin.order_manager.index', [
            'orders' => $orders,
        ]);
    }

    public function create()
    {
        return view('admin.order_manager.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'screening_id' => 'require',
            'reservation_type_id' => 'require',
            'reservation_contact' => 'require',
            'date' => 'require',
            'status' => 'require',
            'customer_id' => 'require'
        ]);
        if ($validator->passes()){
            $orders = new Reservation();
            $orders-> screening_id = $request->screening_id;
            $orders-> reservation_type_id = $request->reservation_type_id;
            $orders-> date = $request->date;
            $orders-> reservation_contact = $request->reservation_contact;
            $orders->status = $request->status;
            $orders->save();
            $request->session()->flash('success', 'Orders added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Orders added successfully'
            ]);

        }else{
            return response()->json([
               'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($orderId, Request $request)
    {
        $order = Reservation::find($orderId);
        if (empty($order)){
            $request->session()->flash('error', 'Order not found');
            return redirect()->route('order.index');
        }
        $data['order'] = $order;
        return view('admin.order_manager.edit', $data);
    }

    public function update($orderId, Request $request)
    {
        $order = Reservation::find($orderId);
        if (empty($order)){
            $request->session()->flash('error', 'Order not found');

            return response()->json([
               'status' => false,
               'notFound' => true,
                'message' => 'Order not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            // 'status' => 'required',
            'screening_id' => 'require',
            'reservation_type_id' => 'require',
            'reservation_contact' => 'require',
            'date' => 'require',
            'customer_id' => 'require'
        ]);
        if ($validator->passes()){
            $order->status = $request->status;
            $order->save();
            $request->session()->flash('success', 'Order updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Order updated successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($orderId, Request $request)
    {
        $order = Reservation::find($orderId);
        if (empty($order)){
            $request->session()->flash('error', 'Order not found');
            return response()->json([
                'status' => true,
                'message' => 'Order not found'
            ]);
        }

        $order->delete();
        $request->session()->flash('success', 'Order deleted successfully');
        return response()->json([
           'status' => true,
           'message' => 'Order deleted successfully'
        ]);
    }
}
