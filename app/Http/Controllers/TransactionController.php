<?php

namespace App\Http\Controllers;
use App\User;
use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests\AllowRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Auth;
use Mail;




class TransactionController extends Controller
{
    public function ShowSendMoney(Request $request)
    {

        $users = User::all();
        return view('transactions.SendMoney')->with('users',$users);
    }

    public function ShowTransactionHistory(Request $request)
    {
        $users = User::all();
        $transactions = Transaction::all();
        $transaction_to_user = Transaction::where('to_user_id',Auth()->user()->id)->get();
        for ($i = 0; $i < count($transaction_to_user) ; $i++) {
            if($transaction_to_user[$i]->read = '1'){
                $transaction_to_user[$i]->read = '0';
                $transaction_to_user[$i]->save();
            }
            
        }
        return view('transactions.ShowTransactionHistory')->with('users',$users)->with('transactions',$transactions);
    }

    public function SendMoney(Request $request)
    {
        
        $from_user = Auth()->user();
        $to_user= User::where('iban', $request->input('iban'))->first();
        
        if($to_user == null){
            return back()->withErrors(['Please enter a valid IBan']);
        }
        else{
            
        $transaction = new Transaction;

        $transaction->from_user_id = $from_user->id;
        $transaction->to_user_id = $to_user->id;
        $transaction->amount = $request->input('amount');
        
        $transaction->description = $request->input('description');
        
        $transaction->read = '1';
        

        if( $from_user->deposit >= $transaction->amount){
        $from_user->deposit =  $from_user->deposit - $transaction->amount;
        $to_user->deposit =  $to_user->deposit + $transaction->amount;
        $transaction->save();
        $from_user->save();
        $to_user->save();
        return back()->withErrors(['Success, the money has been sent!!!']);
        }
        else{
            return back()->withErrors(['Error: You do not have enough money in the account']);
        }
    }


    }
}
