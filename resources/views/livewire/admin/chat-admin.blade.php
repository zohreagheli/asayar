<div class="py-4">
    <div class="app-content" style="background: transparent;">

        <h3 class="text-center mb-4 fw-bold" style="color:#5e42a6;">💬 پنل پشتیبانی ادمین</h3>

        <div class="row g-3 flex-column">

            <!-- جدول کاربران -->
            <div class="col-12" wire:key="users-table">
                <h6 class="mb-3">لیست کاربران</h6>
                <div class="table-responsive shadow-sm rounded-3">
                    <table class="table table-hover align-middle text-center chat-table">
                        <thead class="table-light">
                            <tr>
                                <th>شناسه کاربر/مهمان</th>
                                <th>آخرین پیام</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userList as $row)
                                @php
                                    $user = $row->identifier;
                                    $lastMsg = \App\Models\Message::where(function ($q) use ($user) {
                                        is_numeric($user) ? $q->where('user_id', $user) : $q->where('guest_id', $user);
                                    })->latest()->first();
                                @endphp
                                <tr class="{{ $selectedUser == $user ? 'table-primary' : '' }}" style="cursor:pointer;"
                                    wire:click="selectUser({{ is_numeric($user) ? $user : "'$user'" }})">
                                    <td>{{ is_numeric($user) ? "کاربر ثبت‌نامی #$user" : "مهمان #$user" }}</td>
                                    <td>{{ $lastMsg ? \Illuminate\Support\Str::limit($lastMsg->message, 25) : '-' }}</td>
                                    <td>
                                        <span class="badge {{ $lastMsg && $lastMsg->is_admin ? 'bg-success' : 'bg-warning text-dark' }}">
                                            {{ $lastMsg && $lastMsg->is_admin ? 'پاسخ داده شده' : 'منتظر پاسخ' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- شماره صفحات -->
                <div class="mt-3 d-flex justify-content-center">
                    {{ $userList->links() }}
                </div>
            </div>

            <!-- پیام‌ها -->
            <div class="col-12" wire:poll.3000ms="loadMessagesForSelectedUser">
                @if ($selectedUser)
                    <div class="chat-box shadow-sm rounded-3 mb-3">
                        @foreach ($chatMessages as $msg)
                            <div class="chat-message {{ $msg->is_admin ? 'admin' : 'user' }}">
                                <div class="bubble">
                                    <strong class="d-block mb-1">
                                        {{ $msg->is_admin ? 'ادمین:' : ($msg->user_id ? 'کاربر:' : 'مهمان:') }}
                                    </strong>
                                    <div>{{ $msg->message }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <form wire:submit.prevent="sendReply" class="d-flex border-top pt-3">
                        <input type="text" wire:model.defer="replyText" class="form-control me-2"
                            placeholder="پاسخ خود را بنویسید...">
                        <button class="btn btn-primary px-4" type="submit">ارسال پاسخ</button>
                    </form>
                @else
                    <div class="alert alert-info text-center mt-5">
                        لطفاً یک کاربر را از جدول بالا انتخاب کنید.
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
