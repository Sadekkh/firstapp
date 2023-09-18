@extends('adminLayouts.table')

@section('table')
    <table id="myTable" class="display" style="width: 100% !important">
        <thead>
            <tr>
                <th>{{ __('nameprod') }} </th>
                <th>{{ __('category') }} </th>
                <th>{{ __('brand') }} </th>
                <th>{{ __('offer') }} </th>
                <th>{{ __('state') }} </th>
                <th>{{ __('badge') }} </th>
                <th>{{ __('price_pre_disc') }} </th>
                <th>{{ __('discount') }} </th>
                <th>{{ __('price_disc') }} </th>
                <th>{{ __('price_buy') }} </th>
                <th>{{ __('date_end_disc') }} </th>
                <th>{{ __('priority') }} </th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($product as $c)
                @if (App::isLocale('ar'))
                    <tr>
                        <td>{{ $c->name_ar }}</td>

                        <td>{{ $c->category->name_ar }}</td>
                        <td>
                            @if ($c->brand != null)
                                {{ $c->brand->name_ar }}
                            @endif
                        </td>
                        <td>
                            @if ($c->offer != null)
                                {{ $c->offer->name_ar }}
                            @endif
                        </td>

                        <td>
                            @switch($c->status)
                                @case('pending')
                                    <button type="button" class="btn btn-warning">
                                        {{ __('pending') }} </button>
                                @break

                                @case('pause')
                                    <button type="button" class="btn btn-danger">
                                        {{ __('paused') }}
                                    </button>
                                @break

                                @case('active')
                                    <button type="button" class="btn btn-success">
                                        {{ __('active') }}
                                    </button>
                                @break
                            @endswitch
                        </td>
                        <td>{{ $c->badge }}</td>

                        <td>{{ $c->price }}</td>
                        <td>{{ $c->discount }}%</td>
                        <td>{{ $c->price_disc }}</td>
                        <td>{{ $c->primary_price }}</td>
                        <td>{{ $c->date_end_disc }}</td>
                        <td>
                            @switch($c->trending)
                                @case(1)
                                    <button type="button" class="btn btn-success">
                                        {{ __('yes') }} </button>
                                @break

                                @case(0)
                                    <button type="button" class="btn btn-danger">
                                        {{ __('no') }}
                                    </button>
                                @break
                            @endswitch
                        </td>

                        <td><a href="{{ route('admin.product.edit', $c->id) }}">{{ __('edit') }}</a></td>
                    </tr>
                @elseif (App::isLocale('en'))
                    <tr>
                        <td>{{ $c->name_en }}</td>

                        <td>{{ $c->category->name_en }}</td>
                        <td>
                            @if ($c->brand != null)
                                {{ $c->brand->name_en }}
                            @endif
                        </td>
                        <td>
                            @if ($c->offer != null)
                                {{ $c->offer->name_en }}
                            @endif
                        </td>

                        <td>
                            @switch($c->status)
                                @case('pending')
                                    <button type="button" class="btn btn-warning">
                                        {{ __('pending') }} </button>
                                @break

                                @case('pause')
                                    <button type="button" class="btn btn-danger">
                                        {{ __('paused') }}
                                    </button>
                                @break

                                @case('active')
                                    <button type="button" class="btn btn-success">
                                        {{ __('active') }}
                                    </button>
                                @break
                            @endswitch
                        </td>
                        <td>{{ $c->badge }}</td>

                        <td>{{ $c->price }}</td>
                        <td>{{ $c->discount }}%</td>
                        <td>{{ $c->price_disc }}</td>
                        <td>{{ $c->primary_price }}</td>
                        <td>{{ $c->date_end_disc }}</td>
                        <td>
                            @switch($c->trending)
                                @case(1)
                                    <button type="button" class="btn btn-success">
                                        {{ __('yes') }} </button>
                                @break

                                @case(0)
                                    <button type="button" class="btn btn-danger">
                                        {{ __('no') }}
                                    </button>
                                @break
                            @endswitch
                        </td>

                        <td><a href="{{ route('admin.product.edit', $c->id) }}">{{ __('edit') }}</a></td>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
