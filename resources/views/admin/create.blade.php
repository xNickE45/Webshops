<!-- resources/views/admin/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Console</h1>
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="image_url">Image</label>
            <input type="file" class="form-control" id="image_url" name="image_url" required onchange="previewImage(event)">
            <img id="image_preview" class="img-thumbnail mt-2" width="150" style="display: none;">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    <a href="{{ route('admin.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function() {
            const img = document.getElementById('image_preview');
            img.src = reader.result;
            img.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection
