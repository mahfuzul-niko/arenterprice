<x-admin>
    <x-slot name="title">Dashboard</x-slot>
    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>

                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('admin/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('admin/images/users/no-profile.png') }}"
                                    alt="" class="img-thumbnail rounded-circle"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-0 ">Total Point : <span class="text-success">{{ Auth::user()->points }}</span></p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">


                                <div class=" d-flex justify-content-end gap-3">
                                    <h5 class="font-size-15">{{ $userOrderTotalPrice }} Taka</h5>
                                    <p class="text-muted mb-0">Sold</p>
                                </div>
                                <div class=" d-flex justify-content-end gap-3">
                                    <h5 class="font-size-15 text-danger">{{ $userOrderDuePrice }} Taka</h5>
                                    <p class="text-muted mb-0">Due</p>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('edit.profile') }}"
                                        class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i
                                            class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Order Table</h4>
                    <p class="card-title-desc"></p>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Id</th>
                                    <th><a href="#" data-table-filter="true" data-order="total_price"
                                            data-value="desc">Total
                                            Price</a>
                                    </th>
                                    <th><a href="#" class="" data-table-filter="true"
                                            data-order="paid_price" data-value="desc">Paid Price </a>
                                    </th>
                                    <th><a href="#" data-table-filter="true" data-order="due"
                                            data-value="desc">Due Price</a>
                                    </th>
                                    <th><a href="#" data-table-filter="true" data-order="created_at"
                                            data-value="desc">Created At</a>
                                    </th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userOrder as $key => $order)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $order->unique_id }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>{{ $order->paid_price }}</td>
                                        <td>{{ $order->due }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td><a href="{{ route('user.order.single', $order->unique_id) }}"
                                                class="btn btn-success">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
                <div class="mx-auto">
                    {{ $userOrder->onEachSide(5)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</x-admin>
