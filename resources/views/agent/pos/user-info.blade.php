<x-admin>
    <x-slot name="title">User Info</x-slot>
    <form action="" class="">


        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customer Data Input</h5>
                    <p class="card-title-desc">Please Fill the fields</p>
                    <form action="{{ route('agent.user.info') }}" method="GET">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="" required
                                name="phone" value="{{ request()->phone }}">
                            <label for="floatingInput" class="ms-2">Number</label>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mb-3">
                            <a href="{{ route('agent.user.info') }}" class="btn btn-primary">Reset</a>
                            <button type="submit" class="btn btn-info">Check User</button>
                        </div>
                    </form>
                    @if (request()->phone)
                        @if ($customer->phone)
                            <div class="alert alert-success" role="alert">
                                You are a Customer complete Order
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Fill the required form to complete Order
                            </div>
                        @endif

                        <form action="{{ route('agent.create.order') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phone" value="{{ request()->phone }}">
                            <div class="row">
                                <div class="col-6">
                                    <div class=" mb-3">
                                        <label for="" class="">Total Point</label>
                                        <input type="text" class="form-control" id="" placeholder=""
                                            required name="points" value="{{ $total_point }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class=" mb-3">
                                        <label for="" class="">Added Point</label>
                                        <input type="text" class="form-control" id="" placeholder=""
                                            required name="added_points" value="+ {{ $add_points }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingnameInput"
                                    placeholder="Enter Name" value="{{ $customer->name }}" name="name">
                                <label for="floatingnameInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingemailInput"
                                    placeholder="Enter Email address" value="{{ $customer->email }}" name="email">
                                <label for="floatingemailInput">Email address</label>
                            </div>
                            <div class=" mb-3">
                                <label for="">Address</label>
                                <textarea name="address" id="" rows="5" class="form-control" name="address">{{ $customer->address }}</textarea>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md ">Submit</button>
                            </div>
                        </form>
                    @endif
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>

    </form>
</x-admin>
