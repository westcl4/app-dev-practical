<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Validator;

class CustomerController extends Controller
{
    public function createCustomer(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required'
        // ]);
    
        // if ($validator->fails()) {
        //     return response()->json(['message' => $validator->errors()], 403);
        // } else {
            Customer::create($request->all());
            return response()->json(['message' => 'Customer created.'], 201);
        // }
    
    }
    public function updateCustomer(Request $request, $id){
        $customers = Customer::query();
        if ($customers->where('id', $id)->exists()) {
            $customer = $customers->find($id);
            $customer->first_name = is_null($request->first_name) ? $customer->first_name : $request->first_name;
            $customer->last_name = is_null($request->last_name) ? $customer->last_name : $request->last_name;
            $customer->phone = is_null($request->phone) ? $customer->phone : $request->phone;
            $customer->email = is_null($request->email) ? $customer->email : $request->email;
            $customer->save();
            return response()->json(['message' => 'Customer updated.'], 200);
        } else {
            return response()->json(['message' => 'Customer not found.'], 404);
        }
    }
    public function deleteCustomer($id){
        $customers = Customer::query();
        if ($customers->where('id', $id)->exists()) {
            $customer = $customers->find($id);
            $customer->delete();
            return response()->json(['message' => 'Customer deleted.'], 202);
        } else {
            return response()->json(['message' => 'Customer not found.'], 404);
        }
    }
    public function getAllCustomers(Request $request){
        $customers = Customer::query();
        if ($request->get('first_name')) {
            $customers->where('first_name', '=', $request->get('first_name'));
        }
        return $customers->get();
    }
    public function getCustomer($id){
        $customers = Customer::query();
        if ($customers->where('id', $id)->exists()) {
            $customer = $customers->where('id', $id)->get();
            return response($customer, 200);
        } else {
            return response()->json(['message' => 'Customer not found.'], 404);
        }
    }
}
