<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\SeatReserved;
use App\Requests\StoreCustomerRequest;
use App\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{


    public function register()
    {
        return view('customer.register');
    }

    public function registerProcess(StoreCustomerRequest $request)
    {
        if ($request->validated()) {
            $array = [];
            $array = Arr::add($array, 'first_name', $request->first_name);
            $array = Arr::add($array, 'last_name', $request->last_name);
            $array = Arr::add($array, 'email', $request->email);
            $array = Arr::add($array, 'password', Hash::make($request->password));
            $array = Arr::add($array, 'phone_number', $request->phone_number);
            $array = Arr::add($array, 'address', $request->address);
            $array = Arr::add($array, 'status', 1);
            //Lấy dữ liệu từ form và lưu lên db
            Customer::create($array);

            return Redirect::route('customer.login');
        } else {
            //cho quay về trang login
            return Redirect::back();
        }
    }

    public function login()
    {
        return view('customer.login');
    }

    public function loginProcess(Request $request)
    {
        $account = $request->only(['email', 'password']);
        $check = Auth::guard('customer')->attempt($account);

        if ($check) {
            //Lấy thông tin của customer đang login
            $customer = Auth::guard('customer')->user();
            //Cho login
            Auth::guard('customer')->login($customer);
            //Ném thông tin customer đăng nhập lên session
            session(['customer' => $customer]);
            $id =  Auth::guard('customer')->user()->id;
            $date = Reservation::all()->where('customer_id', '=',$id);


            $today = date('Y-m-d');

            foreach($date as $checkExpiredDate){
                if($checkExpiredDate->date < $today){
                   $checkExpiredDate->status = 2;
                   $checkExpiredDate->save();
                }
            } 
        
            return Redirect::route('profile');
        } else {
            //cho quay về trang login
            return Redirect::back();
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        session()->forget('customer');
        return view('customer.logoutConfirm');
    }

    public function forgotPassword()
    {
        return view('customer.login');
    }

    public function editProfile()
    {
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        return view('customer.profiles.profile', [
            'customer' => $customer
        ]);
    }

    public function updateProfile(UpdateCustomerRequest $request)
    {
        //Lấy dữ liệu trong form và update lên db
        $array = [];
        $array = Arr::add($array, 'first_name', $request->first_name);
        $array = Arr::add($array, 'last_name', $request->last_name);
        $array = Arr::add($array, 'email', $request->email);
        $array = Arr::add($array, 'phone_number', $request->phone_number);
        $array = Arr::add($array, 'address', $request->address);

        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $customer->update($array);
        //Quay về danh sách
        return Redirect::route('profile');
    }

    public function showOrderHistory()
    {
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $orders = Reservation::where('customer_id', $id)->paginate(2);
        return view('customer.profiles.orderHistory', [
            'customer' => $customer,
            'orders' => $orders,
        ]);
    }

    public function orderDetail(Reservation $order)
    {
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $orderId = $order->id;
        $orderDetails = DB::table('orders_details')
            ->where('order_id', '=', $orderId)
            ->join('products', 'orders_details.product_id', '=', 'products.id')
            ->get();

        $orderAmount = 0;
        $orderItems = 0;
        foreach ($orderDetails as $detail) {
            $orderItems += $detail->sold_quantity;
            $orderAmount += $detail->sold_price * $detail->sold_quantity;
        }
        $orderTotal = $orderAmount + 10;

        return view('customers.profiles.orderDetail', [
            'order' => $order,
            'order_details' => $orderDetails,
            'order_item' => $orderItems,
            'order_amount' => $orderAmount,
            'order_total' => $orderTotal,
            'customer' => $customer,
        ]);
    }

    public function editPassword()
    {
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        return view('customer.profiles.changePassword', [
            'customer' => $customer
        ]);
    }

    public function updatePassword(UpdateCustomerRequest $request)
    {
        $newPwd = Hash::make($request->new_pwd);
        $newPwd2 = $request->new_pwd2;

        $array = [];
        $array = Arr::add($array, 'password', $newPwd);
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $customer->update($array);

        return Redirect::route('profile')->with('success', 'Your password has been changed successfully');
    }

    public function indexAdmin(Request $request)
    {
        $customers = Customer::latest();
        if (!empty($request->get('keyword'))){
            $customers = $customers->where('first_name', 'like', '%'.$request->get('keyword').'%' ) -> orWhere('last_name', 'like', '%'.$request->get('keyword').'%' );
        }
        $customers = $customers->paginate(10);
        return view('admin.customer_manager.index', ['customers' => $customers]);
    }


    public function create()
    {
        return view('admin.customer_manager.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
            ],
            //'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);
        if ($validator->passes()){
            $customer = new Customer();
            $customer->email  = $request->email;
            $customer->password = Hash::make($request->password);
            $customer->first_name  = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->phone_number  = $request->phone_number;
            $customer->address = $request->address;
            $customer->status = $request->status;
            $customer->save();
            $request->session()->flash('success', 'Customer added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Customer added successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function edit($customerId, Request $request)
    {
        $customer = Customer::find($customerId);
        if (empty($customer)){
            $request->session()->flash('error', 'Customer not found');
            return redirect()->route('customerAdmin.index');
        }
        $data['customer'] = $customer;
        return view('admin.customer_manager.edit', $data);
    }

    public function update($customerId, Request $request)
    {
        $customer = Customer::find($customerId);
        if (empty($customer)){
            $request->session()->flash('error', 'Customer not found');

            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Customer not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);
        if ($validator->passes()){
            $customer->email  = $request->email;
            $customer->password = $request->password;
            $customer->first_name  = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->phone_number  = $request->phone_number;
            $customer->address = $request->address;
            $customer->status = $request->status;
            $customer->save();
            $request->session()->flash('success', 'Customer updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Customer updated successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($customerId, Request $request)
    {
        $customer = Customer::find($customerId);
        if (empty($customer)){
            $request->session()->flash('error', 'Customer not found');
            return response()->json([
                'status' => true,
                'message' => 'Customer not found'
            ]);
        }

        $customer->delete();
        $request->session()->flash('success', 'Customer deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Customer deleted successfully'
        ]);
    }
}
