<x-admin>
    <x-slot name="title">Order Table</x-slot>
    <div class="container-fluid">



        <div class="">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Order Table</h4>
                    <p class="card-title-desc">This table is for Admin & Agent Only</p>
                    <x-orders.list :orders="$orders" />


                </div>
                <div class="mx-auto">
                    {{ $orders->onEachSide(5)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        <!-- end row -->

    </div> <!-- container-fluid -->
</x-admin>
