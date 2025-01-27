@extends('adminlayouts.app')
@section('title', 'تعديل تصنيف')
@section('content')

<div class="mainCont" id="main">
    <div class="pageCont">
        <div class="conta p30">
            <h3>تعديل تصنيف</h3>
        </div>
        <div class="conta p30">
            <form class="inputs" action="{{ route('admin.update-category', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input">
                    <span>اسم التصنيف باللغة العربية:</span>
                    <input type="text" name="name" value="{{ $brand->name }}" spellcheck="false" required>
                </div>
                <div class="input">
                    <label for="file">صورة التصنيف:</label>
                    <div class="customInput">
                        <input type="file" name="image" accept="image/*" hidden id="file">
                        <label for="file">تحميل <i class="fa-regular fa-arrow-up-from-bracket"></i></label>
                    </div>
                    @if($brand->image_path)
                        <div class="prImgs">
                            <div class="pImg oneImg">
                                <img src="{{ asset('storage/' . $brand->image_path) }}" alt="صورة التصنيف">
                            </div>
                        </div>
                    @endif
                </div>
                <button type="submit" class="saveBtn">حفظ التعديلات</button>
            </form>
        </div>
    </div>
</div>

@endsection
