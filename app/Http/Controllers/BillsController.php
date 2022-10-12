<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;

class BillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bills = Bill::query()
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('bills.index', compact('bills'));
    }


    public function store(Request $request)
    {
        $this->mojValidator($request);
        Bill::create($this->modelData($request));

        return redirect()->route('bills.index')->with(['message' => 'Successfully Created BILL!!']);
    }


    public function edit(Bill $billsId)
    {
        $results=Bill::query()->where('user_id',Auth::user()->id)->get();
        $res=$results->first();

        return view('bills.edit',compact('res'));
    }

    public function update(Request $request, $billId)
    {
        $this->mojValidator($request);

        $bill = Bill::find($request->input("invoice_id"));
        $bill->name = $request->input('name');
        $bill->save();

        return redirect()->route('bills.index')->with(['message' => 'Successfully updated!!']);
    }


    public function delete(Bill $bill)
    {
            $bill->delete();
            return redirect()->route('bills.index')->with(['message' => 'Successfully deleted!!']);
    }

    /**
     * @param Request $request
     * @return void
     */
    private function mojValidator(Request $request): void
    {
        $request->validate([
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
        ]);
        //todo naredi drugace vnos uporabnikov in firm
    }

    /**
     * @param Request $request
     * @return array
     */
    private function modelData(Request $request): array
    {
        return [
            'name'                  => $request->name,
            'surname'               => $request->surname,
            'address'               => $request->due_date,
            'post_address'          => $request->post_address,
            'receiver_iban'              => $request->receiver_iban,
            'receiver_name'              => $request->receiver_name,
            'due_date'              => $request->due_date,
            'price'                 => $request->price,
            'purpose'               => $request->purpose ?? "",
            'user_id'               => Auth::user()->id,
            'company_id'            => $request->input('company_id'),
        ];
    }
}
