<table>
    <thead>
        <tr>
            <th>ID Transaction</th>
            <th>Total Price</th>
            <th>Method Receive</th>
            <th>Name Customer</th>
            <th>Email Customer</th>
            <th>Phone Customer</th>
            <th>Address Customer</th>
            <th>Order ID</th>
            <th>Quantity</th>
            <th>Payment Method</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Name Product</th>
            <th>Color Product</th>
            <th>Memory Product</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $item)
            <tr>
                <td>{{ $item->id_transaction }}</td>
                <td>{{ $item->total_price }}</td>
                <td>
                    @if ($item->method_receive == 0)
                        Nhận hàng tại nhà
                    @elseif($item->method_receive == 1)
                        Giao hàng online
                    @endif
                </td>
                <td>{{ $item->name_user }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->id_order }}</td>
                <td>{{ $item->quantity }}.Cái</td>
                <td>{{ $item->name_method_payment }}</td>
                <td>{{ $item->price }}.VND</td>
                <td>{{ $item->discount }}%</td>
                <td>{{ $item->name_product }}</td>
                <td>
                    @if ($item->color == 0)
                        Red
                    @elseif($item->color == 1)
                        Yellow
                    @elseif($item->color == 2)
                        Violet
                    @elseif($item->color == 3)
                        Violet
                    @elseif($item->color == 4)
                        Black
                    @elseif($item->color == 5)
                        White
                    @elseif($item->color == 6)
                        Other
                    @elseif($item->color == 7)
                        Patific
                    @endif
                </td>
                <td>
                    @if ($item->memory == 0)
                        16GB
                    @elseif($item->memory == 1)
                        32GB
                    @elseif($item->memory == 2)
                        64GB
                    @elseif($item->memory == 3)
                        128GB
                    @elseif($item->memory == 4)
                        256GB
                    @elseif($item->memory == 5)
                        512Gb
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
