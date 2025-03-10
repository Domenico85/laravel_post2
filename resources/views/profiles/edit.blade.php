<x-layout>
    <div class="container">
        <h2>Edit Profile</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profiles.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address"
                    value="{{ old('address', $profile->address) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{ old('phone', $profile->phone) }}" required>
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="avatar" name="avatar">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</x-layout>
