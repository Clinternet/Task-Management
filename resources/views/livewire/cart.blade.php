<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    .tables{
        border: 2px solid rgb(155, 0, 0);
    }
    .tables th{
        border: 2px solid black;
    }
    .tabler{
        border: 10px solid black;
    }
    #prcd{
        background-color: red;
        color: black;
        font-family: bold;
    }
    #rm{
        background-color: red;
    }
    #rm:hover{
        font-size: 13px;
    }
    </style>

<body class="bg-light">

<div class="container mt-5">
    <h3>Your Cart</h3>

    @if(session('cart'))
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr class="tables">
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $productId => $details)
                    <tr class="tabler">
                        @if (!empty($details['file_path']))
                        <td>
                            <img src="{{ asset('uploads/product-images/' . $details['file_path']) }}"
                                class="img-fluid" style="height: 80px; object-fit: cover;" alt="Product Image">
                        </td>
                        @else
                        <td>
                            <img src="{{ asset('uploads/product-images/default.jpg') }}"
                                class="img-fluid" style="height: 80px; object-fit: cover;" alt="No Image">
                        </td>
                        @endif

                        <td>{{ $details['name'] }}</td>
                        <td>₱{{ number_format($details['price'], 2) }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>₱{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        <td>
                            <!-- Button to remove product from cart -->
                            <a href="{{ route('cart.remove', $productId) }}" class="btn btn-sm btn-danger text-black" id="rm">Remove</a>
                        </td>
                    </tr>
                @endforeach

                @php
                    $total = 0;
                    foreach(session('cart') as $details) {
                        $total += $details['price'] * $details['quantity'];
                    }
                @endphp

                <tr>
                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                    <td><strong>₱{{ number_format($total, 2) }}</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="mt-3">
            <a href="{{ route('purchase.page') }}" class="btn btn-primary" id="prcd">Proceed to Purchase</a>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>


</body>
</html>
