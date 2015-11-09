<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <style>h1, a {color: #c64d44;}</style>
</head>
<body>

<h1>Sweet Sweet Chocolates</h1>
<p>Thanks {{ $user->fname }} for your order!</p>

<table class="table">
    <thead>
        <th>Item</th>
        <th>Price per unit</th>
        <th>Quantity</th>
        <th>Line total</th>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td><a href="{{ route('product.item', array('id' => $item->id)) }}">{{ $item->name }}</a></td>
                <td>${{ $item->price }}</td>
                <td>{{ $item->pivot->quantity }}</td>
                <td>${{ number_format($item->pivot->quantity * $item->price, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th>Total</th>
        <th></th>
        <th></th>
        <th>${{ number_format($order->transaction_total, 2) }}</th>
    </tfoot>
</table>
</body>
</html>