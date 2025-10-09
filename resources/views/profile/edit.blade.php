<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
    @include('partials.styleGlobal')
    <style>
        .current-profile-photo {
            text-align: center;
            margin-bottom: 20px;
        }
        .current-profile-photo img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
            cursor: pointer;
        }
        /* Sembunyikan input file default */
        #profile_photo {
            display: none;
        }
    </style>
</head>
<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>

                        <!-- Tampilkan error validasi -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="current-profile-photo">
                            @if($user->profile_photo)
                                <img id="profileImage" 
                                     src="{{ asset('storage/' . $user->profile_photo) }}" 
                                     alt="Profile Photo">
                            @else
                                <img id="profileImage" 
                                     src="{{ asset('assets/images/faces/default.jpg') }}" 
                                     alt="Default Profile Photo">
                            @endif
                        </div>

                        <form action="{{ route('profile.update', $user->id_user) }}" 
                              method="POST" 
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            
                            <!-- Tambahkan input file tersembunyi -->
                            <input type="file" 
                                   id="profile_photo" 
                                   name="profile_photo" 
                                   accept="image/*" 
                                   style="display:none;">
                            
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" 
                                       value="{{ old('name', $user->name) }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" 
                                       value="{{ old('username', $user->username) }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" 
                                       value="{{ old('email', $user->email) }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Password Baru (Opsional)</label>
                                <input type="password" name="password" class="form-control">
                                <small class="form-text text-muted">
                                    Kosongkan jika tidak ingin mengganti password
                                </small>
                            </div>
                            
                          f12  <div class="form-group">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Profil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.jspage')
    @include('partials.jsglobal')
    <script>
        // Tambahkan event listener untuk membuka file manager
        document.getElementById('profileImage').addEventListener('click', function() {
            document.getElementById('profile_photo').click();
        });

        // Preview gambar yang dipilih
        document.getElementById('profile_photo').addEventListener('change', function(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                document.getElementById('profileImage').src = src;
            }
        });
    </script>
</body>
</html>