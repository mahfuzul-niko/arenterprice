<x-admin>

    <x-slot name="title">Point Of Sell</x-slot>
    <div class="card ">
        <div class="card-body">
            <form class="app-search d-flex gap-3 " method="GET" action="{{ route('agent.product') }}">
                <div class="position-relative">
                    <input type="text" class="form-control" name="search" placeholder="Search..."
                        value="{{ request('search') }}">
                    <span class="bx bx-search-alt"></span>
                </div>
                <button type="submit" class="btn btn-primary rounded-circle fw-bold"><i
                        class="bx bx-search"></i></button>
                <a href="{{ route('agent.pos') }}" class="btn btn-danger rounded-circle"><i
                        class="bx bx-revision"></i></a>
            </form>
        </div>
    </div>
    <div class="row">


        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>image</th>
                                    <th>Brand Name</th>
                                    <th>Product Name</th>
                                    <th>Price / Unit</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ $product->image ? Storage::url($product->image) : asset('admin/images/product/no-product.png') }}"
                                                class="img-fluid" alt="..."
                                                style="height: 100px; width: 150px; object-fit: cover;"></td>
                                        <td>{{ $product->brand_name }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->price }} / {{ $product->unit }} </td>
                                        <td>
                                            <form action="{{ route('agent.add.cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1" min="1">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="bx bx-cart "></i></button>
                                            </form>
                                        </td>
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
                    <h5 class="card-title">Date & Submit</h5>
                    <p class="card-title-desc">Enter all the data</p>
                    <form action="{{ route('agent.add.pament') }}" method="POST">
                        @csrf
                        <div class="col-md-12">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingnameInput"
                                    value="{{ $grandTotal }}" name="total_price" placeholder="Enter Name" disabled>
                                <label for="floatingnameInput">Grand Total</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" min="0" class="form-control" id="floatingnameInput"
                                    value="" placeholder="Enter Name" name="paid_price">
                                <label for="floatingnameInput">Paid Price</label>
                            </div>

                        </div>

                        <div class="row align-items-end gap-3">
                            <div class="col-md-6">
                                <label class="form-label">Sale Date</label>
                                <input type="date" class="form-control" id="saleDate" name="dates">
                            </div>
                            <div class="col-md-5 text-end">
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{-- cart table  --}}
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>price</th>
                                    <th>Quantity / unit</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $productId => $product)
                                    <tr>
                                        <td>
                                            <form action="{{ route('agent.remove.cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $productId }}">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bx bx-block "></i>
                                                </button>
                                            </form>

                                        </td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['subtotal'] }}</td>
                                        <td>
                                            <form id="updateCartForm_{{ $productId }}"
                                                action="{{ route('agent.update.cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $productId }}">
                                                <input type="number" class="form-control" name="quantity"
                                                    value="{{ $product['quantity'] }}" min="1">
                                            </form>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success"
                                                onclick="document.getElementById('updateCartForm_{{ $productId }}').submit();">
                                                <i class="bx bx-check-double "></i>
                                            </button>
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
