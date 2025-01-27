@extends('adminlayouts.app')
@section('title', 'اضافة سيارة')
@section('content')

<div class="mainCont" id="main">
    <div class="pageCont">
        <div class="conta p30">
            <h3>اضافة سيارة</h3>
        </div>
        <div class="conta p30">
            <form class="inputs" action="{{ route('admin.store-car') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- اسم السيارة -->
                <div class="input">
                    <span>اسم السيارة باللغة العربية:</span>
                    <input type="text" name="name" value="{{ old('name') }}" spellcheck="false" required>
                </div>
                <!-- تفاصيل السيارة -->
                <div class="input">
                    <span>تفاصيل السيارة باللغة العربية:</span>
                    <textarea name="description" rows="3" spellcheck="false" required>{{ old('description') }}</textarea>
                </div>
                <!-- سنة الصنع -->
                <div class="input">
                    <span>سنة الصنع:</span>
                    <input type="number" name="year" value="{{ old('year') }}" min="1900" max="{{ date('Y') }}" spellcheck="false" required>
                </div>
                <!-- التصنيف -->
                <div class="input">
                    <span>تصنيف السيارة:</span>
                    <select name="brand_id" required>
                        <option value="" disabled selected>اختر تصنيف السيارة</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- السعر -->
                <div class="input">
                    <span>سعر السيارة:</span>
                    <input type="number" name="price" value="{{ old('price') }}" spellcheck="false" required>
                </div>
                <!-- تحميل صور متعددة -->
                <div class="input">
                    <label for="images">صور السيارة:</label>
                    <div class="customInput">
                        <input type="file" name="images[]" accept="image/*" multiple id="images" required>
                        <label for="images">تحميل الصور <i class="fa-regular fa-arrow-up-from-bracket"></i></label>
                    </div>
                </div>
                <!-- زر الإرسال -->
                <button type="submit" class="saveBtn">حفظ واضافة</button>
            </form>
        </div>
    </div>
</div>
@endsection