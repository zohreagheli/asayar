<div class="container py-5" wire:poll.3000ms="loadMessages">

    {{-- Header --}}
    <div class="text-center mb-4">

        <div
            class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle"
            style="
                width:80px;
                height:80px;
                background:linear-gradient(
                    135deg,
                    #6351a7,
                    #362280
                );
            ">

            <i class="fa-solid fa-headset text-white fs-2"></i>

        </div>

        <h3
            class="fw-bold mb-2"
            style="color:#5e42a6;">

            پشتیبانی آنلاین آسایار

        </h3>

        <small class="text-success">

            ● کارشناسان ما آنلاین هستند

        </small>

    </div>

    <div
        class="card border-0 shadow-lg rounded-4 overflow-hidden"
        style="
            max-width:900px;
            margin:auto;
        ">

        {{-- Chat Header --}}
        <div
            class="p-3 text-white"
            style="
                background:linear-gradient(
                    135deg,
                    #6351a7,
                    #362280
                );
            ">

            <div
                class="
                    d-flex
                    align-items-center
                    justify-content-between
                ">

                <div class="d-flex align-items-center">

                    <div
                        class="
                            rounded-circle
                            d-flex
                            align-items-center
                            justify-content-center
                            me-3
                        "
                        style="
                            width:45px;
                            height:45px;
                            background:rgba(255,255,255,.15);
                        ">

                        <i class="fa-solid fa-headset"></i>

                    </div>

                    <div>

                        <div class="fw-bold">

                            پشتیبانی آسایار

                        </div>

                        <small>

                            پاسخگویی آنلاین

                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- Messages --}}
        <div
            class="chat-area"
            id="chatArea">

            @forelse($chatMessages as $msg)

                @if($msg->is_admin)

                    <div class="message-row admin">

                        <div class="avatar-admin">

                            <i class="fa-solid fa-headset"></i>

                        </div>

                        <div class="admin-bubble">

                            <div class="fw-bold small mb-1">
                                پشتیبانی
                            </div>

                            {{ $msg->message }}

                            <div class="message-time">

                                {{ $msg->created_at->format('H:i') }}

                            </div>

                        </div>

                    </div>

                @else

                    <div class="message-row user">

                        <div class="user-bubble">

                            <div class="fw-bold small mb-1">

                                {{ auth()->check() ? 'شما' : 'مهمان' }}

                            </div>

                            {{ $msg->message }}

                            <div class="message-time text-start">

                                {{ $msg->created_at->format('H:i') }}

                            </div>

                        </div>

                        <div class="avatar-user">

                            <i class="fa-solid fa-user"></i>

                        </div>

                    </div>

                @endif

            @empty

                <div
                    class="
                        h-100
                        d-flex
                        align-items-center
                        justify-content-center
                    ">

                    <div class="text-center text-muted">

                        <i class="fa-solid fa-comments fs-1 mb-3"></i>

                        <div>

                            هنوز پیامی ارسال نشده است

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

        {{-- Form --}}
        <div class="border-top bg-white p-3">

            <form wire:submit.prevent="sendMessage">

                <div class="input-group">

                    <input
                        type="text"
                        wire:model.defer="messageText"
                        class="form-control border-0 shadow-none"
                        placeholder="پیام خود را بنویسید...">

                    <button
                        type="submit"
                        class="btn text-white px-4"
                        style="
                            background:linear-gradient(
                                135deg,
                                #6351a7,
                                #362280
                            );
                        ">

                        <i class="fa-solid fa-paper-plane ms-1"></i>

                        ارسال

                    </button>

                </div>

                @error('messageText')

                    <div class="text-danger small mt-2">

                        {{ $message }}

                    </div>

                @enderror

            </form>

        </div>

    </div>

    <style>

        .chat-area {

            height: 550px;
            overflow-y: auto;
            background: #f6f7fb;
            padding: 25px;
            scroll-behavior: smooth;

        }

        .message-row {

            display: flex;
            margin-bottom: 18px;

        }

        .message-row.admin {

            justify-content: flex-start;

        }

        .message-row.user {

            justify-content: flex-end;

        }

        .avatar-admin {

            width: 44px;
            height: 44px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: linear-gradient(
                135deg,
                #3f2d67,
                #6f54a6
            );

            color: #fff;

            box-shadow:
                0 4px 15px rgba(63,45,103,.30);

        }

        .avatar-user {

            width: 44px;
            height: 44px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ececec;

            color: #666;

        }

        .admin-bubble {

            position: relative;

            background: linear-gradient(
                135deg,
                #3f2d67,
                #6f54a6
            );

            color: #fff;

            padding: 12px 16px;

            border-radius: 18px 18px 18px 4px;

            max-width: 75%;

            margin-right: 10px;

            box-shadow:
                0 5px 20px rgba(63,45,103,.15);

            word-break: break-word;

        }

        .admin-bubble:after {

            content: '';

            position: absolute;

            right: 100%;
            bottom: 12px;

            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
            border-right: 8px solid #5b4b8a;

        }

        .user-bubble {

            position: relative;

            background: #fff;

            color: #333;

            padding: 12px 16px;

            border-radius: 18px 18px 4px 18px;

            max-width: 75%;

            border: 1px solid #ececec;

            margin-left: 10px;

            box-shadow:
                0 4px 15px rgba(0,0,0,.05);

            word-break: break-word;

        }

        .user-bubble:after {

            content: '';

            position: absolute;

            left: 100%;
            bottom: 12px;

            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
            border-left: 8px solid #fff;

        }

        .message-time {

            font-size: 11px;

            opacity: .75;

            margin-top: 6px;

        }

    </style>

    <script>

        document.addEventListener('livewire:initialized', () => {

            const scrollBottom = () => {

                let chat = document.getElementById('chatArea');

                if(chat){

                    chat.scrollTop = chat.scrollHeight;

                }

            };

            scrollBottom();

            Livewire.hook('morph.updated', () => {

                scrollBottom();

            });

        });

    </script>

</div>
