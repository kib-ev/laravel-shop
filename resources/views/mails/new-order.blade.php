<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заказ {{ $order->id }}</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table td {
            border: 1px solid #ccc;
            padding: 2px 5px;
        }
    </style>
</head>
<body>
    Поступил новый заказ номер {{ $order->id }}<br><br>

    Имя: {{ $order->name }}<br>
    Телефон: {{ $order->phone }}<br>
    Email: {{ $order->email }}<br><br>


    <table>
        @foreach($order->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->count }}</td>
            </tr>
        @endforeach
    </table>
{{--    <pre>--}}
{{--        {{ print_r($order->toArray()) }}--}}
{{--    </pre>--}}
</body>
</html>

