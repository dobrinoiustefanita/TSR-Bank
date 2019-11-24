<?php

namespace App\Http\Controllers;
use App\User;
use App\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Client\ClientRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{   
    public function getCreateclients() {
        
        return view('users.clients.CreateClients');
    }

    public function postCreateClients(Request $request)
    {
        
        $client = new Client;
        $client->user_id = Auth::user()->id;
        $client->firstname =  $request->input('firstname');
        $client->lastname =  $request->input('lastname');
        $client->email = $request->input('email');
        $client->phone_number = $request->input('phone_number');
        $client->fax = $request->input('fax');
        $client->street = $request->input('street');
        $client->number = $request->input('number');
        $client->city = $request->input('city');
        $client->country = $request->input('country');
        $client->save();

        return redirect()->route('EditClients');
        
        
    }

    protected function getEditClient(){
        
        
        $client = Client::all();
        $user = User::find(Auth::user()->id);
        $current_client = $user->client->last();
        
        
        if ($current_client) {
            $current_client->creation_date = $current_client->creation_date == "0000-00-00 00:00:00" ? "" : date('Y-m-d', strtotime($current_client->creation_date));
            return view('users.clients.EditClients', ['current_client' => $current_client, 'client'=>$client]);
        } else {
            return view('users.clients.CreateClients');
        }
    }
    protected function postEditClient(Request $request){
        $client = Client::all();
        $user = User::find(Auth::user()->id);
        $current_client = $user->client->last();

        $current_client->fill($request->all());
        $current_client->save();

            
        if ($current_client) {
            $current_client->creation_date = $current_client->creation_date == "0000-00-00 00:00:00" ? "" : date('Y-m-d', strtotime($current_client->creation_date));
            return view('users.clients.EditClients', ['current_client' => $current_client, 'client'=>$client]);
        } else {
            return view('users.clients.CreateClients');
        }
            
        
    }

    public function getDeleteClient($id) {
        // TODO - Limit access to the parent user
        $client = Client::find($id);
        $client->delete();
        return Redirect::to(URL::route('users_dashboard'));
    }

}
