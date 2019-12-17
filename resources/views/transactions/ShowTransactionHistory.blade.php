@extends('layouts.admin_lte')

@section('content')

<h1>Transaction History</h1>

<div>
   
    @foreach($transactions as $transaction)
        @if($transaction->from_user_id == Auth()->user()->id)
            <div class="pad margin no-print">
                <div class="callout callout-danger" style="margin-bottom: 0!important;">
                    <p style="font-size: 20px; color:black; font-weight: bold;">Transaction booking - Decremental:
                        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title='
                        @if($transaction->description)
                         {{$transaction->description}}   
                        @endif'>
                        </i>
                    </p>
                    
                    <p style="font-size: 15px; color:black; text-align:right ; margin-top: -35px;">On: {{$transaction->created_at}}</p>
                    <p style="font-size: 20px; color:black ; font-weight: bold;">You
                        @if(App\User::find($transaction->to_user_id)->client->last())
                            <span style="font-size: 15px; color:black">gave {{$transaction->amount}} RON to {{(App\User::find($transaction->to_user_id))->client->last()->firstname}} {{(App\User::find($transaction->to_user_id))->client->last()->lastname}} </span>
                        @else
                        <span style="font-size: 15px; color:black">gave {{$transaction->amount}} RON to {{(App\User::find($transaction->to_user_id)->name)}}</span>
                        @endif
                    </p>
                    
                </div>
            </div>
        @elseif($transaction->to_user_id == Auth()->user()->id)
            @if(App\User::find($transaction->from_user_id)->isAdmin == 1)
            <div class="pad margin no-print">
                <div class="callout callout-info" style="margin-bottom: 0!important;">
                    <p style="font-size: 20px; color:black ; font-weight: bold;">Transaction booking - Incremental:
                        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title='
                        @if($transaction->description)
                         {{$transaction->description}}   
                        @endif'>
                        </i>
                    </p>
                    
                    <p style="font-size: 15px; color:black; text-align:right ; margin-top: -35px;">On: {{$transaction->created_at}}</p>
                <p style="font-size: 20px; color:black ; font-weight: bold;">The bank
                <span style="font-size: 15px; color:black"> gave you {{$transaction->amount}} RON </span></p>
                </div>
            </div>
            @else
            <div class="pad margin no-print">
                <div class="callout callout-success" style="margin-bottom: 0!important;">
                    <p style="font-size: 20px; color:black; font-weight: bold;">Transaction booking - Incremental:
                        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title='
                        @if($transaction->description)
                         {{$transaction->description}}   
                        @endif'>
                        </i>
                    </p>
                    
                    <p style="font-size: 15px; color:black; text-align:right ; margin-top: -35px;">On: {{$transaction->created_at}}</p>
                    @if(App\User::find($transaction->to_user_id)->client->last())
                    <p style="font-size: 20px; color:black ; font-weight: bold;">{{(App\User::find($transaction->to_user_id))->client->last()->firstname}} {{(App\User::find($transaction->to_user_id))->client->last()->lastname}}
                    @else
                    <p style="font-size: 20px; color:black ; font-weight: bold;">{{(App\User::find($transaction->from_user_id)->name)}}
                    @endif
                        <span style="font-size: 15px; color:black"> gave you {{$transaction->amount}} RON</span></p>
                </div>
            </div>
            @endif
        @endif
    
    @endforeach
<div>    

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('#side-menu-profile').addClass('active');
    })
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@endpush