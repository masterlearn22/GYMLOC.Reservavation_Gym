@extends('admin.menu.layouts.app')

@section('content')
<h1>Edit Menu</h1>

<form action="{{ route('menu.update', $menu->MENU_ID) }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Form input existing fields -->
    <div class="form-group">
        <label for="MENU_NAME">Nama Menu</label>
        <input type="text" class="form-control" id="MENU_NAME" name="MENU_NAME" value="{{ $menu->MENU_NAME }}" required>
    </div>
    <div class="form-group">
        <label for="MENU_LINK">Link Menu</label>
        <input type="text" class="form-control" id="MENU_LINK" name="MENU_LINK" value="{{ $menu->MENU_LINK }}" required>
    </div>
    <div class="form-group">
        <label for="MENU_ICON">Icon Menu</label>
        <input type="text" class="form-control" id="MENU_ICON" name="MENU_ICON" value="{{ $menu->MENU_ICON }}" required>
    </div>

    <!-- Role selection -->
    <div class="form-group">
        <label for="roles">Pilih Role yang bisa akses menu ini:</label>
        <div>
            @foreach($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id_role}}" 
                    id="role_{{ $role->id_role}}"
                    {{ in_array($role->id_role, $selectedRoles) ? 'checked' : '' }}>
                    <label class="form-check-label" for="role_{{ $role->id_role}}">
                        {{ $role->role }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
