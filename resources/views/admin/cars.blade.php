@extends('adminlayouts.app')
@section('title', 'السيارات')
@section('content')

<div class="mainCont" id="main">
    <!-- Start Main Content -->
    <div class="pageCont">
        <div class="conta p30">
            <h3> اضافة وتعديل السيارات </h3>
            <div class="btns">
                <a href="{{ route('admin.add-car') }}" class="saveBtn">اضافة سيارة +</a>
            </div>
        </div>
        <div class="conta p30">
            <form class="taIn">
                <table class="tg">
                    <thead>
                        <tr>
                            <th>صورة السيارة</th>
                            <th>تفاصيل السيارة باللغة العربية</th>
                            <th>مواصفات السيارة</th>
                            <th>سعر السيارة</th>
                            <th>ادوات التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cars as $car)
                        <tr>
                            <td>
                                <!-- عرض الصورة الأولى للسيارة إذا كانت متوفرة -->
                                @if($car->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $car->images->first()->image_path) }}" alt="صورة السيارة">

                                @else
                                    <img src="{{ asset('images/bg_3.jpg') }}" alt="صورة افتراضية">
                                @endif
                            </td>
                            <td class="mw200">{{ $car->name }}</td>
                            <td class="mw200">{{ $car->description }}</td>
                            <td class="mw200">{{ $car->price }} دينار أردني</td>
                            <td class="tools">
                                <!-- أدوات التحكم -->
                                <a href="{{ route('admin.edit-car', $car->id) }}">
                                    <img src="{{ asset('assets/media/icons/edit.png') }}" alt="تعديل" id="edit">
                                </a>
                                <form action="{{ route('admin.delete-car', $car->id) }}" method="POST" style="display: inline;">
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
                            <td colspan="5">لا توجد سيارات مضافة بعد</td>
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