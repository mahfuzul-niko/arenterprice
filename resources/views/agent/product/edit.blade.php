<x-admin>
    <x-slot name="title">Dashboard</x-slot>
    <form class="row" action="{{ route('agent.product.update',$product) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-md-8 mx-auto">
            <div id="product-cards">
                <div class="card product-card">
                    <div class="card-body">
                        <h5 class="card-title">Sale Products</h5>
                        <p class="card-title-desc">Enter all the data</p>
                        <div class="my-4 row">
                            <div class="col-md-5">
                                <img id="imgPreview"
                                    src="{{ $product->image ? Storage::url($product->image) : asset('admin/images/product/no-product.png') }}"
                                    alt="Product Image" class="img-fluid">
                            </div>
                            <div class="col-md-7">
                                <label for="formFileLg" class="form-label">Product Image</label>
                                <input class="form-control form-control-lg" id="formFileLg" type="file"
                                    name="image" onchange="previewImage(event)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="brandName"
                                        placeholder="Enter Brand Name" name="brand_name" value="{{$product->brand_name}}">
                                    <label for="brandName">Brand Name</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="productName"
                                        placeholder="Enter Product Name" name="product_name" value="{{$product->product_name}}" required>
                                    <label for="productName">Product Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control price-input" placeholder="Enter Price"
                                        min="0" name="price" value="{{$product->price}}" required>
                                    <label for="price">Price</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <select class="form-control" name="unit" required>
                                        @foreach ($units as $item)
                                        <option value="{{ $item->unit }}" {{ $product->unit == $item->unit ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control quantity-input"
                                        placeholder="Enter Quantity" min="0" name="quantity" value="{{$product->quantity}}">
                                    <label for="quantity">Quantity</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" name="description">{{$product->description}}</textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("saleDate").value = today;
        });
    </script>
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imgPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-admin>
