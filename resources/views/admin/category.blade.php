@extends('adminlayouts.app')
@section('title', 'التصنيفات')
@section('content')

<div class="mainCont" id="main">
    <!-- Start Main Content -->
    <div class="pageCont">
        <div class="conta p30">
            <h3>اضافة وتعديل التصنيفات</h3>
            <div class="btns">
                <a href="{{ route('admin.add-category') }}" class="saveBtn">اضافة تصنيف +</a>
            </div>
        </div>
        <div class="conta p30">
            <form class="taIn">
                <table class="tg">
                    <thead>
                        <tr>
                            <th>صورة التصنيف</th>
                            <th>اسم التصنيف باللغة العربية</th>
                            <th>ادوات التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($brands as $brand)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $brand->image_path) }}" alt="{{ $brand->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                            </td>
                            <td class="mw200">{{ $brand->name }}</td>
                            <td class="tools">
                                <a href="{{ route('admin.brand.edit', $brand->id) }}">
                                    <img src="{{ asset('assets/media/icons/edit.png') }}" alt="تعديل" id="edit">
                                </a>
                                <form action="{{ route('admin.brand.delete', $brand->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none;">
                                        <img src="{{ asset('assets/media/icons/delete.png') }}" alt="حذف">
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">لا توجد تصنيفات مضافة بعد</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <!-- End Main Content -->
</div>

@endsection