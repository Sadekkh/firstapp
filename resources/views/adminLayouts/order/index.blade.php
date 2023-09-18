@extends('adminLayouts.table')

@section('table')
    <table id="myTable" class="display table table-striped" style="width: 100% !important">
        <thead>
            <tr>
                <th>{{ __('Client_name') }} </th>
                <th>{{ __('order_code') }} </th>
                <th>{{ __('mobile_number') }} </th>
                <th>{{ __('adress') }} </th>
                <th>{{ __('state') }} </th>
                <th>{{ __('city') }} </th>
                <th>{{ __('payment_method') }} </th>
                <th>{{ __('total') }} </th>
                <th>{{ __('status') }} </th>
                <th>{{ __('edit') }} </th>


            </tr>
        </thead>
        <tbody>
            @foreach ($order as $c)
                <tr>
                    <td>{{ $c->fullname }}</td>
                    <td>{{ $c->order_code }}</td>
                    <td>{{ $c->mobile_num }}</td>
                    <td>{{ $c->adress }}</td>
                    <td>{{ $c->state }}</td>
                    <td>{{ $c->city }}</td>
                    <td>{{ $c->paymentMethod }}</td>
                    <td>{{ $c->total }}</td>
                    <td>
                        @if ($c->status == 0)
                            <button class="btn btn-danger">{{ 'pending' }}</button>
                        @elseif ($c->status == 1)
                            <button class="btn btn-primary">{{ 'confirmed' }}</button>
                        @elseif ($c->status == 2)
                            <button class="btn btn-info">{{ 'on_delivery' }}</button>
                        @elseif ($c->status == 3)
                            <button class="btn btn-success">{{ 'delivered' }}</button>
                        @elseif ($c->status == 4)
                            <button class="btn btn-warning">{{ 'canceled' }}</button>
                        @endif
                    </td>




                    <td><a href="{{ route('admin.order.show', $c->id) }}">{{ __('edit') }}</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
