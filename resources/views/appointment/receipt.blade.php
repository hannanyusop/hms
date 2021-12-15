@extends('layouts.user')

@section('module', __('Appointment'))
@section('title', __('Receipt'))

@section('content')
    <div class="page-content profile-settings pt-0">
        <button class="btn btn-info m-4 float-end" onclick="return printJs()"><i class="fa fa-print"> Print</i></button>
        <div class="container inv-section" id="print">
            <div class="top-inv-col">
                <div class="inv-logo">
                    <img alt="" src="../assets/images/logo.html">
                </div>
                <div class="order-details">
                    <p>Order: <span>#00124</span></p>
                    <p>Issued: <span>20/07/2019</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h5>Invoice From</h5>
                    <ul class="inv-receiver">
                        <li>Dr. Darren Elder<br> 806 Twin Willow Lane, Old Forge,<br> Newyork, USA</li>
                    </ul>
                    <h5>Invoice To</h5>
                    <ul class="inv-receiver">
                        <li>Dr. Darren Elder<br> 806 Twin Willow Lane, Old Forge,<br> Newyork, USA</li>
                    </ul>
                </div>
                <div class="col-6">
                    <div class="payment-method">
                        <h5>Payment Method</h5>
                        <ul>
                            <li>Debit Card<br> XXXXXXXXXXXX-2541<br> HDFC Bank</li>
                        </ul>
                    </div>
                </div>
            </div>
            <table class="inv-table">
                <tbody>
                <tr>
                    <th class="text-align-left">Description</th>
                    <th class="text-align-center">Quantity</th>
                    <th class="text-align-center">Price /Item</th>
                    <th class="text-align-center">Total</th>
                </tr>
                @foreach($appointment->bill->items as $item)
                <tr>
                    <td>{{ $item->item }}</td>
                    <td class="text-align-center">{{ $item->qty }}</td>
                    <td class="text-align-center">RM {{ $item->price_per_item }}</td>
                    <td class="text-align-center">RM {{ $item->total_price }}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3"><b>Subtotal</b></td>
                    <td colspan="1">RM {{ $appointment->bill->total }}</td>
                </tr>
                <tr>
                    <td colspan="3"><b>Discount</b></td>
                    <td colspan="1">RM 0.00</td>
                </tr>
                <tr>
                    <td colspan="3"><b>Total Amout:</b></td>
                    <td colspan="1">RM {{ $appointment->bill->total }}</td>
                </tr>
                </tfoot>
            </table>
            <div class="invoice-info">
                <h5>Other information</h5>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus.</p>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        function printJs(){
            var element = document.getElementById('#print');
            html2pdf(element);
        }
    </script>
@endpush
