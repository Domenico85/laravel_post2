<x-layout>
    <div class="container">
        <h2 class="text-center">Profile</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card profile-card">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <img src="{{ $user->profile->avatar ? asset('storage/' . $user->profile->avatar) : asset('default-avatar.png') }}"
                        alt="Profile Avatar" width="100">
                </div>
                <p><strong class="text-danger">Name:</strong> {{ $user->name }}</p>
                <p><strong class="text-danger">Email:</strong> {{ $user->email }}</p>
                <p><strong class="text-danger">Address:</strong> {{ $user->profile->address ?? 'N/A' }}</p>
                <p><strong class="text-danger">Phone:</strong> {{ $user->profile->phone ?? 'N/A' }}</p>

                <a href="{{ route('profiles.edit') }}" class="btn btn-warning">Edit Profile</a>

            </div>
        </div>
    </div>
</x-layout>
