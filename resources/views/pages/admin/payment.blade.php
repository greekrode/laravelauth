@extends('layouts.app')

@section('template_title')
    @lang('usersmanagement.showing-all-users')
@endsection

@section('template_linked_css')
    @if(config('laravelusers.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('laravelusers.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Showing All Payment
                            </span>

                            {{-- <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        @lang('usersmanagement.users-menu-alt')
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/users/create">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        @lang('usersmanagement.buttons.create-new')
                                    </a>
                                    <a class="dropdown-item" href="/users/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        @lang('usersmanagement.show-deleted-users')
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="card-body">
                        @if(session()->has('message'))
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>    
                            {{ session()->get('message') }}
                        </div>
                        @endif

                        {{-- @if(config('usersmanagement.enableSearchUsers'))
                            @include('partials.search-users-form')
                        @endif --}}

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    {{ trans_choice('usersmanagement.users-table.caption', 1, ['userscount' => $payments->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>@lang('usersmanagement.users-table.id')</th>
                                        <th>@lang('usersmanagement.users-table.name')</th>
                                        <th>Endorsement Title</th>
                                        <th>Bank Name</th>
                                        <th>Bank Account Name</th>
                                        <th>Bank Account Number</th>
                                        <th>Payment Date</th>
                                        <th>Amount</th>
                                        <th>Remarks</th>
                                        <th>Payment Transcript</th>
                                        <th>@lang('usersmanagement.users-table.actions')</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{$payment->id}}</td>
                                            <td>{{$payment->user->name}}</td>
                                            <td>{{ $payment->job->title }}</td>
                                            <td>{{ $payment->bank_name }}</td>
                                            <td>{{ $payment->account_name }}</td>
                                            <td>{{ $payment->account_number }}</td>
                                            <td>{{ date('M d,Y',strtotime($payment->payment_date)) }}</td>
                                            <td>Rp {{ number_format($payment->amount, 2) }}</td>
                                            <td>{{ $payment->remarks }}</td>
                                            <td><a class="btn btn-sm btn-info btn-block" href="{{ url('payment_download/'.$payment->id) }}" data-toggle="tooltip" title="Download">Download Payment</a></td>
                                            @if($payment->accept == 0 && $payment->reject == 0)
                                            <td>
                                                {!! Form::open(array('url' => 'payment/'.$payment->id.'/payment_reject' , 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Reject')) !!}
                                                    {!! Form::hidden('_method', 'POST') !!}
                                                    {!! Form::button('REJECT', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Reject Payment', 'data-message' => 'Are you sure you want to reject this payment?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            @else
                                            <td>

                                            </td>
                                            @endif
                                            
                                            @if($payment->accept == 1 && $payment->reject == 0)
                                            <td>

                                            </td>
                                            @else
                                            <td>
                                                {!! Form::open(array('url' => 'payment/'.$payment->id.'/payment_accept', 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Accept')) !!}
                                                    {!! Form::hidden('_method', 'POST') !!}
                                                    <input type="submit" class="btn btn-success btn-sm" style="width:100%;" value="ACCEPT">
                                                {!! Form::close() !!}
                                            </td>
                                            @endif
                                            {{-- <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('users/' . $user->id) }}" data-toggle="tooltip" title="Show">
                                                    @lang('usersmanagement.buttons.show')
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('users/' . $user->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    @lang('usersmanagement.buttons.edit')
                                                </a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('usersmanagement.enableSearchUsers'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('usersmanagement.enablePagination'))
                                {{ $payments->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @if ((count($payments) > config('usersmanagement.datatablesJsStartCount')) && config('usersmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('usersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('usersmanagement.enableSearchUsers'))
        @include('scripts.search-users')
    @endif
@endsection
