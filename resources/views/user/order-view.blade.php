<x-admin>
    <x-slot name="title">Single Order</x-slot>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Order</h5>
                    <p class="card-title-desc">This Is All Information About Your Order</p>
                    <div class="table-responsive">
                        <table class="table mb-0 ">
                            <tr>
                                <td>
                                    <span class="fw-bold">Customer Name</span> : {{ $order->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">Order Total Price</span> : <span
                                        class="text-primary">{{ $order->total_price }} taka</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">Order Paid Price</span> : <span
                                        class="text-success">{{ $order->paid_price }} taka</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold ">Order Due Price</span> : <span
                                        class="text-danger">{{ $order->due }} taka</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Brand Name</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Product Note</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order->products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $product->brand_name }}
                                        </td>
                                        <td>
                                            {{ $product->product_name }}
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">History of due</h5>
                    <p class="card-title-desc">Enter the amount or paments</p>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order->histories as $key => $history)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $history->date }}
                                        </td>
                                        <td>
                                            {{ $history->amount }}
                                        </td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
       
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("saleDate").value = today;
        });
    </script>
</x-admin>
