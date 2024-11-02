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
                                    alt="" class="img-thumbnail rounded-circle"  style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ Auth::user()->role }}</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">


                                <div class=" text-end">
                                    <h5 class="font-size-15">{{ $authorOrderTotalPrice }} Taka</h5>
                                    <p class="text-muted mb-0">Sold</p>
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
                    <p class="card-title-desc">This table is for Admin & Agent Only</p>
                    <x-orders.list :orders="$authorOrder" />
    
    
                </div>
                <div class="mx-auto">
                    {{ $authorOrder->onEachSide(5)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</x-admin>