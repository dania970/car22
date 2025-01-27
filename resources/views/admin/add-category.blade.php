@extends('adminlayouts.app')
@section('title', 'اضافة تصنيفات')
@section('content')

<div class="mainCont" id="main">
    <!-- Start Main Content -->
    <div class="pageCont">
        <div class="conta p30">
            <h3>اضافة وتعديل التصنيفات</h3>
        </div>
        <div class="conta p30">
            <form class="inputs" action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input">
                    <span>اسم التصنيف باللغة العربية:</span>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="أدخل اسم التصنيف" spellcheck="false" required>
                </div>
                <div class="input">
                    <label for="file">صورة التصنيف:</label>
                    <div class="customInput">
                        <input type="file" name="image" accept="image/*" hidden id="file" required>
                        <label for="file">تحميل <i class="fa-regular fa-arrow-up-from-bracket"></i></label>
                    </div>
                </div>
                <div class="prImgs">
                    @if(session('image'))
                        <div class="pImg oneImg">
                            <img src="{{ session('image') }}" alt="">
                            <i class="fa-light fa-trash-can" onclick="removeImg(this)"></i>
                        </div>
                    @endif
                </div>
                <button type="submit" class="saveBtn">حفظ واضافة</button>
            </form>
        </div>
    </div>
</div>

@endsection