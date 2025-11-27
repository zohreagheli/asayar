<div class="container py-5" wire:poll.3000ms="loadMessages">
    <h3 class="text-center mb-4" style="color:#5e42a6;">چطور می تونیم کمکتون کنیم؟</h3>

    <div class="card shadow border-0" style="max-width:600px; margin:auto; background-color:#f8f6ff;">
        <div class="card-body" style="height:400px; overflow-y:auto;">
            @foreach($chatMessages as $msg)
                <div class="mb-2 {{ $msg->is_admin ? 'text-end' : 'text-start' }}">
                    <div class="d-inline-block px-3 py-2 rounded"
                        style="background-color: {{ $msg->is_admin ? '#d3caff' : '#e6e0ff' }};">
                        <strong>{{ $msg->is_admin ? 'ادمین:' : ($msg->user_id ? 'کاربر:' : 'مهمان:') }}</strong>
                        <div>{{ $msg->message }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <form wire:submit.prevent="sendMessage" class="d-flex border-top" novalidate>
            <input type="text" class="form-control border-0" placeholder="پیام خود را بنویسید..."
                   wire:model.defer="messageText">
            <button class="btn btn-primary px-4" type="submit">ارسال</button>
        </form>
        @error('messageText')
    <div class="text-danger text-center mt-2 small">{{ $message }}</div>
@enderror
    </div>
</div>
