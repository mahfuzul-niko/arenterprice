<x-admin>
    <x-slot name="title">Dashboard</x-slot>
    <div class="mb-3">
        <a href="{{ route('agent.product.create') }}" class="btn btn-success"><i class="bx bx-plus"></i> Add New
            Product</a>
    </div>

    <div class="card col-md-4">
        <div class="card-body">
            <form class="app-search d-flex gap-3 " method="GET" action="{{ route('agent.product') }}">
                <div class="position-relative">
                    <input type="text" class="form-control" name="search" placeholder="Search..."
                        value="{{ request('search') }}">
                    <span class="bx bx-search-alt"></span>
                </div>
                <button type="submit" class="btn btn-primary rounded-circle fw-bold"><i
                        class="bx bx-search"></i></button>
                <a href="{{ route('agent.product') }}" class="btn btn-danger rounded-circle"><i
                        class="bx bx-revision"></i></a>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $item)
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-start">
                            <img src="{{ $item->image ? Storage::url($item->image) : asset('admin/images/product/no-product.png') }}"
                                class="img-fluid" alt="..." style="height: 200px; width: auto; object-fit: cover;">

                            <div class="flex-grow-1 overflow-hidden mt-3">
                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                        class="text-dark">{{ $item->product_name }}</a></h5>
                                <p class="text-muted mb-1"> <b>Brand :</b> {{ $item->brand_name }} </p>
                                <div class="d-flex gap-4">
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark"><b>Price :</b> {{ $item->price }} Taka</a></h5>
                                    <h5 class="text-truncate font-size-15"><a href="javascript: void(0);"
                                            class="text-dark"><b>Quantity :</b> {{ $item->quantity }}
                                            {{ $item->unit }}</a></h5>
                                </div>
                                <p class="text-muted mb-1">{{ $item->description }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top">
                        <ul class="list-inline mb-0">

                            <li class="list-inline-item me-3">
                                <a href="{{ route('agent.product.edit', $item->slug) }}"
                                    class="fw-bold text-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                            </li>
                            <li class="list-inline-item me-3">
                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('agent.product.delete', $item) }}" method="POST"
                                    onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <a href="javascript:void(0);" class="fw-bold text-danger"
                                    onclick="submitDeleteForm({{ $item->id }})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        @endforeach



        <div class="col-5 my-4 mx-auto">
            {{ $products->onEachSide(5)->links('pagination::bootstrap-4') }}
        </div>

    </div>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this portfolio?');
        }

        function submitDeleteForm(id) {
            if (confirmDelete()) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</x-admin>
