<x-admin>
    <x-slot name="title">User </x-slot>
    <div class="container-fluid">



        <div class="">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Order Table</h4>
                    <p class="card-title-desc">This table is for User Only</p>
                    <div class="col-3 mb-2">
                        <form class="app-search d-flex gap-3">
                            <div class="position-relative">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill">search</button>
                        </form>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Id</th>
                                    <th><a href="{{ route('user.order.list', 'total_price') }}">Total Price</a></th>
                                    <th><a href="{{ route('user.order.list', 'paid_price') }}">Paid Price</a></th>
                                    <th><a href="{{ route('user.order.list', 'due') }}">Due Price</a></th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$order->unique_id}}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>{{ $order->paid_price }}</td>
                                        <td>{{ $order->due }}</td>
                                        <td><a href="{{ route('user.order.single', $order->unique_id) }}"
                                                class="btn btn-success">View</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="mx-auto">
                    {{$orders->onEachSide(5)->links('pagination::bootstrap-4');}}
                </div>
            </div>
        </div>

        <!-- end row -->

    </div>
</x-admin>