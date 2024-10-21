<x-admin>
    <x-slot name="title">Single Order</x-slot>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Order details</h4>
                </div>
                <div class="card-body">
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
                    <h5 class="card-title">Date & Due Clear</h5>
                    <p class="card-title-desc">Enter the amount or paments</p>

                    <form action="{{route('due.clear',$order)}}" method="POST">
                        @csrf
                        <div class="col-md-12">

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="amount" placeholder="Paid Price"
                                    name="amount" min="0">
                                <label for="amount">Amount</label>
                            </div>
    
                        </div>
    
                        <div class="row align-items-end gap-3">
                            <div class="col-md-6">
                                <label class="form-label">Sale Date</label>
                                <input type="date" class="form-control" id="saleDate" name="date">
                            </div>
                            <div class="col-md-5 text-end">
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>
                    </form>
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
