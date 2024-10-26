<x-admin>
    <x-slot name="title">Customer list</x-slot>
    <div class="container-fluid">



        <div class="">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Customers Table</h4>
                    <p class="card-title-desc">This table is for Admin & Agent Only</p>
                    <div class="col-3 mb-2">
                        <form class="app-search d-flex gap-3">
                            <div class="position-relative">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill">search</button>
                            <a href="{{ route('agent.customer') }}" class="btn btn-danger rounded-circle"><i
                                class="bx bx-revision"></i></a>
                        </form>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Number</th>
                                    <th>Customer Point</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->phone}}</td>
                                        <td>{{ $user->points}}</td>
                                        <td><a href="{{ route('agent.single.customer', $user->id) }}"
                                                class="btn btn-success">View</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="mx-auto">
                    {{ $users->onEachSide(5)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        <!-- end row -->

    </div> <!-- container-fluid -->
</x-admin>