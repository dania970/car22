@extends('adminlayouts.app')
@section('title', 'تعديل السيارة')
@section('content')

<style>
    .mainCont {
    padding: 6rem;
    background-color: rgb(249, 249, 249);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: flex-start !important;
}

.mainCont h3 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 2rem;
    text-align: right;
    width: 100%;
    max-width: 600px;
}

.mainCont form {
    width: 100%;
    max-width: 600px;
    margin: 0;
}

.mainCont label {
    display: block;
    margin-bottom: 0.5rem;
    color: #666;
    text-align: right;
}

.mainCont input[type="text"],
.mainCont input[type="number"],
.mainCont textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 0.375rem;
    font-size: 1rem;
    text-align: right;
    margin-bottom: 1.5rem;
}

.mainCont textarea {
    min-height: 100px;
    resize: vertical;
}

.mainCont input[type="file"] {
    display: none;
}

.mainCont input[type="file"] + label {
    display: inline-block;
    width: 100%;
    padding: 0.75rem;
    background-color: #000;
    color: white;
    border-radius: 0.375rem;
    text-align: center;
    cursor: pointer;
    margin-bottom: 1.5rem;
}

.mainCont input[type="file"] + label:hover {
    background-color: #333;
}

.mainCont .saveBtn {
    background-color: #000;
    color: white;
    border: none;
    border-radius: 0.375rem;
    padding: 0.75rem 2rem;
    font-size: 1rem;
    cursor: pointer;
    float: left;
}

.mainCont .saveBtn:hover {
    background-color: #333;
}

@media (max-width: 768px) {
    .mainCont {
        padding: 1rem;
    }
    
    .mainCont input[type="text"],
    .mainCont input[type="number"],
    .mainCont textarea {
        font-size: 16px;
    }
}
</style>

<div class="mainCont">
    <h3>تعديل السيارة</h3>
    <form action="{{ route('admin.update-car', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>اسم السيارة:</label>
        <input type="text" name="name" value="{{ old('name', $car->name) }}" required>

        <label>وصف السيارة:</label>
        <textarea name="description" required>{{ old('description', $car->description) }}</textarea>

        <label>السعر:</label>
        <input type="number" name="price" value="{{ old('price', $car->price) }}" required>

        <label>صور السيارة الحالية:</label>
        <div class="existing-images">
            @foreach($car->images as $image)
                <div class="image-item">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Car Image" style="width: 100px; height: 100px; object-fit: cover;">
                    <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"> حذف الصورة
                </div>
            @endforeach
        </div>

        <label>صور السيارة الجديدة:</label>
        <input type="file" name="images[]" multiple>

        <button type="submit" class="saveBtn">حفظ التعديلات</button>
    </form>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
