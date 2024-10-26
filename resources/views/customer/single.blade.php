<x-admin>
    <x-slot name="title">Single Customer</x-slot>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="col-4 my-4">
                        <div class="avatar-md profile-user-wid " style="width: 100px; height: 100px;">
                            <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('admin/images/users/no-profile.png') }}"
                                alt="Profile Photo" class="img-thumbnail rounded-circle"
                                style="width: 100%; height: 100%; object-fit: cover;">

                        </div>
                    </div>

                    <div class=" mb-4 ms-3 d-flex gap-3">
                        <h3 class="text-primary">Points :</h3>
                        <h3 class="text-success">{{ $user->points }}</h3>
                    </div>
                    <h4 class="card-title mb-4">Personal Information</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                @admin
                                    <tr>
                                        <th>
                                            <label for="floatingSelectGrid"> Change Role :</label>
                                            
                                        </th>
                                        <td>
                                            <form action="{{ route('admin.change.role', $user) }}" method="POST" class="d-flex gap-4" onsubmit="return confirmSubmission()">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="role">
                                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                        <option value="agent" {{ $user->role == 'agent' ? 'selected' : '' }}>Agent</option>
                                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                            
                                            
                                            
                                        </td>
                                    </tr>
                                @endadmin
                                <tr>
                                    <th scope="row">Name :</th>
                                    <td>{{ $user->name }} </td>
                                </tr>

                                <tr>
                                    <th scope="row">Mobile :</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>


                                <tr>
                                    <th scope="row">E-mail :</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address :</th>
                                    <td>{{ $user->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Table</h4>
                    <p class="card-title-desc">This table is for Admin & Agent Only</p>
                    <x-orders.list :orders="$orders" :search="false" />
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmSubmission() {
            return confirm("Are you sure you want to change the user's role?");
        }
    </script>
</x-admin>
