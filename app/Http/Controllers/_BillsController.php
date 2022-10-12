<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BillsController extends Controller
{
    public function __construct()
    {
        $bills = new Bill();
        $this->bills = $bills;
        $table = $bills->getTable();
        $this->table = $table;
    }

    public function index()
    {

        $idBill = Auth::user()->id;
        $results = DB::table($this->table)->where('user_id', '=', $idBill)->get();
        $data = [
            'results' => $results,
        ];
        return view('bills.index', $data);
    }

    public function store(Request $request)
    {

        $rules = [
            'name'                  => 'required',
            'surname'               => 'required',
            'address'               => 'required',
            'post_address'          => 'required',
            'due_date'              => 'required',
            'price'                 => 'required',
            'receiver_iban'         => 'required',
            'receiver_name'         => 'required',
            'receiver_address'      => 'required',
            'receiver_post_address' => 'required',
        ];
        $messages = [
            'name.required'                  => "Please enter name",
            'surname.required'               => "Please enter surname",
            'address.required'               => "Please enter address",
            'post_address.required'          => "Please enter post address",
            'due_date.required'              => "Please enter Date",
            'price.required'                 => "Please enter Date",
            'receiver_iban.required'         => "Please enter receiver IBAN",
            'receiver_name.required'         => "Please enter receiver Name",
            'receiver_address.required'      => "Please enter receiver Address",
            'receiver_post_address.required' => "Please enter receiver Post address",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else if ($validator->passes()) {
            DB::beginTransaction();
            DB::table($this->table)->insert([
                'name'                  => $request->name,
                'surname'               => $request->surname,
                'address'               => $request->address,
                'post_address'          => $request->post_address,
                'due_date'              => $request->due_date,
                'price'                 => $request->price,
                'receiver_iban'         => $request->receiver_iban,
                'receiver_name'         => $request->receiver_name,
                'receiver_address'      => $request->receiver_address,
                'receiver_post_address' => $request->receiver_post_address,
                'purpose'               => $request->purpose ?? "",
                'user_id'               => Auth::user()->id,
            ]);
            DB::commit();
        }
        return redirect()->route('bills.index')->with(['message' => 'Successfully Created BILL!!']);
    }

    public function show($billId)
    {
        $results = DB::table($this->table)->where('invoice_id', '=', $billId)->get();
        if (count($results) > 0) {
            $res = $results->first();
            $name = $res->name;
            $surname = $res->surname;
            $address = $res->address;
            $post_address = $res->post_address;
            $due_date = $res->due_date;
            $price = $res->price;
            $receiver_iban = $res->receiver_iban;
            $receiver_name = $res->receiver_name;
            $receiver_address = $res->receiver_address;
            $receiver_post_address = $res->receiver_post_address;
            $purpose = $res->purpose;
        } else {
            return redirect()->back()->with('message', 'There are no bills');
        }
        $data = [
            'name'                  => $name,
            'surname'               => $surname,
            'address'               => $address,
            'post_address'          => $post_address,
            'due_date'              => $due_date,
            'price'                 => $price,
            'receiver_iban'         => $receiver_iban,
            'receiver_name'         => $receiver_name,
            'receiver_address'      => $receiver_address,
            'receiver_post_address' => $receiver_post_address,
            'purpose'               => $purpose,
        ];
        return view('bills.show', $data);
    }

    public function edit($billId)
    {
        $results = DB::table($this->table)->where('invoice_id', '=', $billId)->get();
        if (count($results) > 0) {
            $res = $results->first();
            $name = $res->name;
            $surname = $res->surname;
            $address = $res->address;
            $post_address = $res->post_address;
            $due_date = $res->due_date;
            $price = $res->price;
            $receiver_iban = $res->receiver_iban;
            $receiver_name = $res->receiver_name;
            $receiver_address = $res->receiver_address;
            $receiver_post_address = $res->receiver_post_address;
            $purpose = $res->purpose ?? "";
        } else {
            return redirect()->back()->with('message', 'There are no bills');
        }
        $data = [
            'res'                   => $res,
            'name'                  => $name,
            'surname'               => $surname,
            'address'               => $address,
            'post_address'          => $post_address,
            'due_date'              => $due_date,
            'price'                 => $price,
            'receiver_iban'         => $receiver_iban,
            'receiver_name'         => $receiver_name,
            'receiver_address'      => $receiver_address,
            'receiver_post_address' => $receiver_post_address,
            'purpose'               => $purpose,
        ];

        return view('bills.edit', $data);
    }

    public function update(Request $request, $billId)
    {
        $rules = [
            'name'                  => 'required',
            'surname'               => 'required',
            'address'               => 'required',
            'post_address'          => 'required',
            'due_date'              => 'required',
            'price'                 => 'required',
            'receiver_iban'         => 'required',
            'receiver_name'         => 'required',
            'receiver_address'      => 'required',
            'receiver_post_address' => 'required',
        ];
        $messages = [
            'name.required'                  => "Please enter name",
            'surname.required'               => "Please enter surname",
            'address.required'               => "Please enter address",
            'post_address.required'          => "Please enter post address",
            'due_date.required'              => "Please enter Date",
            'price.required'                 => "Please enter Date",
            'receiver_iban.required'         => "Please enter receiver IBAN",
            'receiver_name.required'         => "Please enter receiver Name",
            'receiver_address.required'      => "Please enter receiver Address",
            'receiver_post_address.required' => "Please enter receiver Post address",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else if ($validator->passes()) {
            DB::beginTransaction();
            DB::table($this->table)->where('invoice_id', '=', $billId)->update([
                'name'                  => $request->name,
                'surname'               => $request->surname,
                'address'               => $request->address,
                'post_address'          => $request->post_address,
                'due_date'              => $request->due_date,
                'price'                 => $request->price,
                'receiver_iban'         => $request->receiver_iban,
                'receiver_name'         => $request->receiver_name,
                'receiver_address'      => $request->receiver_address,
                'receiver_post_address' => $request->receiver_post_address,
                'purpose'               => $request->purpose ?? "",
                'user_id'               => Auth::user()->id,
            ]);
            DB::commit();
        }
        return redirect()->route('bills.index')->with(['message' => 'Successfully updated!!']);
    }


    public function delete($billId)
    {

        $bill = DB::table($this->table)->where('invoice_id', $billId);
        if ($bill != null) {
            $bill->delete();
            return redirect()->route('bills.index')->with(['message' => 'Successfully deleted!!']);
        } else {
            return redirect()->route('bills.index')->with(['message' => 'Wrong Bill!']);
        }
    }


}
