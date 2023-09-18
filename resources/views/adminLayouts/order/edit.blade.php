@extends('admin.main')
@section('styles')
    <style>

    </style>
@endsection
@section('adminContent')
    <input type="button" value="Convert HTML to PDF" onclick="convertHTMLtoPDF()">
    <form action="{{ route('order.delivered', $order->id) }}" method="POST">
        @csrf
        <select name="status" id="" class="form-control">
            <option @if ($order->status == 0) selected @endif value="0">{{ __('pending') }}</option>
            <option @if ($order->status == 1) selected @endif value="1">{{ __('confirmed') }}</option>
            <option @if ($order->status == 2) selected @endif value="2">{{ __('on_delivery') }}</option>
            <option @if ($order->status == 3) selected @endif value="3">{{ __('delivered') }}</option>
        </select>
        <button class="btn btn-success" type="submit">{{ __('sumbit') }}</button>
    </form>
    <div class="x_content" id="divID" style="font-size: 20px">
        <center>
            <h1>{{ 'order_info' }}</h1>

            <table class="table ">
                <thead>
                    <tr>

                        <th>{{ 'fullname' }}</th>
                        <th>{{ $order->fullname }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('mobile_number') }}</td>
                        <td>{{ $order->mobile_num }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('order_code') }}</td>
                        <td>{{ $order->order_code }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('state') }}</td>
                        <td>{{ $order->state }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('city') }}</td>
                        <td>{{ $order->city }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('adress') }}</td>
                        <td>{{ $order->adress }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('notes') }}</td>
                        <td>{{ $order->notes }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('pymentMethod') }}</td>
                        <td>{{ $order->paymentMethod }}</td>
                    </tr>

                </tbody>
            </table>
            <h1>{{ 'ordered_items' }}</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('product') }}</th>
                        <th>{{ __('details') }}</th>
                        <th>{{ __('price') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = 0;
                    @endphp
                    @foreach ($cart as $c)
                        @php
                            $index += 1;
                        @endphp
                        <tr>
                            <th scope="row">{{ $index }}</th>
                            <td>{{ $c->product->name_en }}</td>
                            <td>
                                @if ($c->color != null)
                                    {{ $c->color }}
                                @endif
                                <br>
                                @if ($c->model != null)
                                    {{ $c->model }}
                                @endif
                            </td>
                            <td>
                                @if ($c->product->discount != 0)
                                    {{ $c->quantity }} X {{ $c->product->price_disc }}
                                @else
                                    {{ $c->quantity }} X {{ $c->product->price }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" align="right">{{ __('shipping') }}</td>
                        <td>{{ $order->shipping }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">{{ __('total') }}</td>
                        <td>{{ $order->total }}</td>
                    </tr>

                </tbody>
            </table>
        </center>
    </div>
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function convertHTMLtoPDF() {
            const {
                jsPDF
            } = window.jspdf;

            let doc = new jsPDF('l', 'mm', [1500, 1400]);
            let pdfjs = document.querySelector('#divID');

            doc.html(pdfjs, {
                callback: function(doc) {
                    doc.save("newpdf.pdf");
                },
                x: 12,
                y: 12
            });
        }
    </script>
@endsection
@endsection
