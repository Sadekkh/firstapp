@extends('adminLayouts.table')

@section('table')
    <table id="myTable" class="display" style="width: 100% !important">
        <thead>
            <tr>
                <th>{{ __('Category') }} </th>
                <th>{{ __('trending') }} </th>
                <th>{{ __('state') }} </th>
                <th>{{ __('products') }} </th>
                <th>{{ __('edit') }} </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($category as $c)
                @if (App::isLocale('ar'))
                    <tr>
                        <td>{{ $c->name_ar }}</td>
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
                        <td> @switch($c->status)
                                @case(0)
                                    <button type="button" class="btn btn-success">{{ __('active') }}</button>
                                @break

                                @case(1)
                                    <button type="button" class="btn btn-danger">{{ __('paused') }} </button>
                                @break
                            @endswitch

                        </td>

                        <td><a href="{{ route('admin.product.show', $c->id) }}"> {{ __('all_prod') }}</a></td>
                        <td><a href="{{ route('admin.category.show', $c->id) }}">{{ __('edit') }}</a></td>
                    </tr>
                @elseif (App::isLocale('en'))
                    <tr>
                        <td>{{ $c->name_en }}</td>
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
                        <td> @switch($c->status)
                                @case(0)
                                    <button type="button" class="btn btn-success">{{ __('active') }}</button>
                                @break

                                @case(1)
                                    <button type="button" class="btn btn-danger">{{ __('paused') }} </button>
                                @break
                            @endswitch

                        </td>

                        <td><a href="{{ route('admin.product.show', $c->id) }}"> {{ __('all_prod') }}</a></td>
                        <td><a href="{{ route('admin.category.show', $c->id) }}">{{ __('edit') }}</a></td>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
