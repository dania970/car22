@extends('adminlayouts.app')
@section('title', 'البريد الوارد')
@section('content')

<div class="mainCont" id="main">
    <div class="pageCont">
        <div class="conta p30">
            <h3> البريد الوارد </h3>
        </div>
        <div class="conta p30">
            <form class="taIn">
                <table class="tg">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>ادوات التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                        <tr>
                            <td class="mw200">{{ $contact->name }}</td>
                            <td class="mw200">{{ $contact->email }}</td>
                            <td class="tools">
                                <a href="#" class="view-message" data-name="{{ $contact->name }}" data-email="{{ $contact->email }}" data-message="{{ $contact->message }}">
                                    <img src="{{ asset('assets/media/icons/edit.png') }}" alt="عرض">
                                </a>
                                <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST" style="display: inline;">
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
                            <td colspan="3">لا توجد رسائل في البريد الوارد</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>
            <div class="paginationCont">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>

<div class="mes" id="message-popup" style="display: none;">
    <div class="p100">
        <div class="contactPop">
            <div class="er">
                <span>الاسم الكامل :</span>
                <span id="popup-name"></span>
            </div>
            <div class="er">
                <span>البريد الالكتروني :</span>
                <span id="popup-email"></span>
            </div>
            <div class="er flc">
                <span>الرسالة :</span>
                <p id="popup-message"></p>
            </div>
            <i class="fa-regular fa-x" id="exit"></i>
        </div>
    </div>
</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewButtons = document.querySelectorAll('.view-message');
        const popup = document.getElementById('message-popup');
        const exitButton = document.getElementById('exit');

        viewButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                const message = this.getAttribute('data-message');

                document.getElementById('popup-name').innerText = name;
                document.getElementById('popup-email').innerText = email;
                document.getElementById('popup-message').innerText = message;

                popup.style.display = 'block';
            });
        });

        exitButton.addEventListener('click', function () {
            popup.style.display = 'none';
        });
    });
</script>
