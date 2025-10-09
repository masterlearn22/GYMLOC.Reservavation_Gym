@extends('admin.menu.layouts.app')


@section('content')
<form class="forms-sample" action="{{ route('user.update', $user->id_user) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="exampleInputName1">Nama Lengkap</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control"required>
    </div>
    <div class="form-group">
        <label for="exampleInputName1">Username</label>
        <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control"required>
    </div>
    <div class="form-group">
        <label for="exampleInputName1">email</label>
        <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
    </div>                    
    <div class="form-group">
        <label>Role</label>
        <select name="id_role" class="form-control" required>
            @foreach ($role as $r)
                <option value="{{ $r->id_role }}"
                    {{ $user->id_role == $r->id_role ? 'selected' : '' }}>
                    {{ $r->role }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="mr-2 btn btn-success">Submit</button>
    <button class="btn btn-light">Cancel</button>
</form>
@endsection