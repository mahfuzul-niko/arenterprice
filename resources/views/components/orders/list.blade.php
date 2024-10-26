@props(['search' => true, 'orders'])
@if($search)
<div class="col-3 mb-2">
    <form class="app-search d-flex gap-3">
        <div class="position-relative">
            <input type="text" class="form-control" name="search" placeholder="Search...">
            <span class="bx bx-search-alt"></span>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill">search</button>
        <a href="{{ route('agent.customer.order') }}" class="btn btn-danger rounded-circle"><i
                class="bx bx-revision"></i></a>
    </form>
</div>
<hr>
@endif
<div class="table-responsive">
    <table class="table mb-0">

        <thead>
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Customer Number</th>
                <th><a href="#" data-table-filter="true" data-order="total_price" data-value="desc">Total
                        Price</a>
                </th>
                <th><a href="#" class="" data-table-filter="true" data-order="paid_price"
                        data-value="desc">Paid Price </a>
                </th>
                <th><a href="#" data-table-filter="true" data-order="due" data-value="desc">Due Price</a>
                </th>
                <th><a href="#" data-table-filter="true" data-order="created_at" data-value="desc">Created At</a>
                </th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->phone }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->paid_price }}</td>
                    <td>{{ $order->due }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('agent.single.order', $order->unique_id) }}" class="btn btn-success">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
