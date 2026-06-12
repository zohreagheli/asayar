<div>

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-11">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-0">

                    <div class="row g-0">

                        {{-- لیست کاربران --}}
                        <div class="col-lg-4 border-end">

                            <div class="p-3 text-white fw-bold" style="background:#896dbd">

                                گفتگوها

                            </div>

                            <div
                                style="
                                    height:700px;
                                    overflow-y:auto;
                                ">

                                @foreach ($userList as $row)
                                    @php

                                        $user = $row->identifier;

                                        $lastMsg = \App\Models\Message::where(function ($q) use ($user) {
                                            is_numeric($user)
                                                ? $q->where('user_id', $user)
                                                : $q->where('guest_id', $user);
                                        })
                                            ->latest()
                                            ->first();

                                    @endphp

                                    <div wire:click="selectUser({{ is_numeric($user) ? $user : "'$user'" }})"
                                        class="
                                            p-3 border-bottom
                                            {{ $selectedUser == $user ? 'bg-light' : '' }}
                                        "
                                        style="cursor:pointer">

                                        <div
                                            class="
                                                d-flex
                                                justify-content-between
                                                align-items-center
                                            ">

                                            <div>

                                                <div class="fw-bold">

                                                    @if (is_numeric($user))
                                                        کاربر #{{ $user }}
                                                    @else
                                                        مهمان
                                                    @endif

                                                </div>

                                                <small class="text-muted">

                                                    {{ $lastMsg ? \Illuminate\Support\Str::limit($lastMsg->message, 40) : '-' }}

                                                </small>

                                            </div>

                                            <span
                                                class="
                                                    badge
                                                    bg-{{ $lastMsg && $lastMsg->is_admin ? 'success' : 'warning text-dark' }}
                                                ">

                                                {{ $lastMsg && $lastMsg->is_admin ? 'پاسخ داده شد' : 'در انتظار' }}

                                            </span>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                            <div class="p-3">

                                {{ $userList->links() }}

                            </div>

                        </div>

                        {{-- بخش چت --}}
                        <div class="col-lg-8">

                            @if ($selectedUser)

                                <div class="chat-header p-3">

                                    <h6 class="fw-bold mb-0">

                                        گفتگو با

                                        @if (is_numeric($selectedUser))
                                            کاربر #{{ $selectedUser }}
                                        @else
                                            مهمان #{{ $selectedUser }}
                                        @endif

                                    </h6>

                                </div>

                                <div wire:poll.3000ms="loadMessagesForSelectedUser" class="p-4 chat-area"
                                    style="
                                        height:550px;
                                        overflow-y:auto;

                                    ">

                                    @foreach ($chatMessages as $msg)
                                        @if ($msg->is_admin)
                                            <div class="message-row admin">

                                                <div class="avatar avatar-admin">

                                                    <i class="fa-solid fa-headset"></i>

                                                </div>

                                                <div class="admin-bubble">

                                                    <div class="fw-bold small mb-1">

                                                        پشتیبانی

                                                    </div>

                                                    <div>

                                                        {{ $msg->message }}

                                                    </div>

                                                    <div class="message-time">

                                                        {{ $msg->created_at->format('H:i') }}

                                                    </div>

                                                </div>

                                            </div>
                                        @else
                                            <div class="message-row user">

                                                <div class="user-bubble">

                                                    <div class="fw-bold small mb-1">

                                                        {{ $msg->user_id ? 'کاربر' : 'مهمان' }}

                                                    </div>

                                                    <div>

                                                        {{ $msg->message }}

                                                    </div>

                                                    <div class="message-time text-start">

                                                        {{ $msg->created_at->format('H:i') }}

                                                    </div>

                                                </div>

                                                <div class="avatar avatar-user">

                                                    <i class="fa-solid fa-user"></i>

                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div
                                    class="
                                        border-top
                                        p-3
                                    ">

                                    <form wire:submit.prevent="sendReply">


                                        <div class="input-group">

                                            <input type="text" wire:model.defer="replyText" class="form-control"
                                                placeholder="پاسخ خود را بنویسید...">

                                            <button class="btn btn-primary">

                                                <i class="fa-solid fa-paper-plane ms-1"></i>

                                                ارسال

                                            </button>

                                        </div>

                                    </form>

                                </div>
                            @else
                                <div class="
                                        d-flex
                                        align-items-center
                                        justify-content-center
                                    "
                                    style="height:700px;">

                                    <div class="text-center">

                                        <i
                                            class="
                                                fa-solid
                                                fa-comments
                                                fs-1
                                                text-muted
                                            ">
                                        </i>

                                        <h5 class="mt-3 text-muted">

                                            یک گفتگو را انتخاب کنید

                                        </h5>

                                    </div>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <style>
        .chat-area {
            background: #f6f7fb;
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

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 14px;
        }

        .avatar-admin{
    width:44px;
    height:44px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:linear-gradient(
        135deg,
        #3f2d67,
        #6f54a6
    );

    color:#fff;

   
    box-shadow:
        0 4px 15px rgba(63,45,103,.30);
}

        .avatar-user {
            background: #e9ecef;
            color: #666;
        }

        .admin-bubble {
            position: relative;
            background: linear-gradient(135deg,
                    #3f2d67,
                    #6f54a6);
            color: #fff;
            padding: 12px 16px;
            border-radius: 18px 18px 18px 4px;
            max-width: 70%;
            margin-right: 10px;
            word-break: break-word;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .15);
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
            max-width: 70%;
            border: 1px solid #e7e7e7;
            margin-left: 10px;
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

        .chat-header {
            background: linear-gradient(135deg,
                    #896dbd,
                    #6f54a6);
            color: #fff;
        }
    </style>


</div>
