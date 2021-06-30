
    <thead class="thead-dark">
    <tr role="row">
        <th>ID</th>
        <th>Note</th>
        <th>Total Price</th>
        <th>Method Receive</th>
        <th>Payment</th>
        <th>Phone</th>
        <th>Status</th>
        <th>View</th>
        <th>Cancel</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($transaction as $item)
        <tr>
            <th scope="col">{{ $item->id_transaction }}</th>
            <td>{{ $item->note }}</td>
            <td>{{ number_format($item->total_price) }}.VND</td>
            <td>
                @if ($item->method_receive == 0)
                    Giao hàng tại nhà
                @elseif($item->method_receive == 1)
                    Nhận hàng tại cửa hàng
                @endif
            </td>
            <td>{{ $item->payment_method->name ?? null }}</td>
            <td>{{ $item->phone }}</td>
            <td>
                @if ($item->status == 3)
                    <span class="dot dot-lg dot-yellow  mr-2"></span>Ordered
                @elseif($item->status == 0)
                    <span class="dot dot-lg dot-other mr-2"></span>In-Processing
                @elseif($item->status == 1)
                    <span class="dot dot-lg dot-patific mr-2"></span>Successful delivery
                @elseif($item->status == 2)
                    <span class="dot dot-lg dot-red mr-2"></span>Delivery failed
                @elseif($item->status == 4)
                    <span class="dot dot-lg dot-green mr-2"></span>Reviewed product
                @endif
            </td>
            <td><a href="{{ route('orderDetail', ['id' => $id, 'transaction_id' => $item]) }}"
                   class="btn mb-1 fas fa-eye"></a></td>
            <td><a href="{{ route('cancelOrder', ['id' => $id, 'id_transaction' => $item]) }}"
                   class="btn mb-1 fas fa-window-close"></a></td>
        </tr>
    @endforeach
    </tbody>

<nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
     aria-label="Page navigation example">
    {{ $transaction->withQueryString()->links('vendor.pagination.customerNextPrevious') }}
{{--    {!! $transaction->links() !!}--}}
</nav>
