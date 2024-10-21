<x-admin>
    <x-slot name="title">Update Profile</x-slot>
    <div class="row">
        <div class="col-xl-4">


            <div class="card">
                <div class="card-body">


                    <div class="col-4 my-4">
                        <div class="avatar-md profile-user-wid " style="width: 100px; height: 100px;">
                            <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('admin/images/users/no-profile.png') }}"
                                alt="Profile Photo" class="img-thumbnail rounded-circle"
                                style="width: 100%; height: 100%; object-fit: cover;">

                        </div>
                    </div>
                    @if (auth::user()->role == 1)
                        <div class=" mb-4 ms-3 d-flex gap-3">
                            <h3 class="text-danger">Points :</h3>
                            <h3 class="text-success">{{ Auth::user()->points }}</h3>
                        </div>
                    @endif
                    <h4 class="card-title mb-4">Personal Information</h4>

                    <p class="text-muted mb-4">{{ Auth::user()->bio ?? '' }}</p>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Name :</th>
                                    <td>{{ Auth::user()->name }} </td>
                                </tr>


                                <tr>
                                    <th scope="row">Mobile :</th>
                                    <td>{{ Auth::user()->phone }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Role :</th>
                                    <td>{{ App\Models\User::ROLES_id[Auth::user()->role] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">E-mail :</th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address :</th>
                                    <td>{{ Auth::user()->address }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('update.password') }}">
                        @csrf
                        <h4 class="card-title mb-4">Change Password</h4>

                        <!-- Current Password -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="currentPassword"
                                placeholder="Enter current password" name="current_password" value="">
                            <label for="currentPassword">Current Password</label>
                        </div>

                        <!-- New Password -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="newPassword"
                                placeholder="Enter new password" name="password" value="">
                            <label for="newPassword">New Password</label>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirmPassword"
                                placeholder="Confirm new password" name="password_confirmation" value="">
                            <label for="confirmPassword">Confirm Password</label>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Profile</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item" style="background: transparent;border:none">
                                        {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Avatar</label>
                            <input type="file" class="form-control" id="" placeholder="Enter Name"
                                name="avatar">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Name"
                                name="name" value="{{ Auth::user()->name }}">
                            <label for="floatingnameInput">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Name"
                                name="username" value="{{ Auth::user()->username }}" disabled>
                            <label for="floatingnameInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Name"
                                name="phone" value="{{ Auth::user()->phone }}" disabled>
                            <label for="floatingnameInput">Number</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingnameInput"
                                placeholder="Enter Name" name="email" value="{{ Auth::user()->email }}">
                            <label for="floatingnameInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingnameInput"
                                placeholder="Enter Name" name="address" value="{{ Auth::user()->address }}">
                            <label for="floatingnameInput">Address</label>
                        </div>
                        <div class=" text-end">
                            <button class="btn btn-success rounded-pill px-4" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('.dropify').dropify();
        </script>
    @endpush
</x-admin>
