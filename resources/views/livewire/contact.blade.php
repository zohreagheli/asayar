<div class="container-fluid py-4">

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-11">

            {{-- اطلاعات تماس --}}
            <div class="row g-4 mb-5">

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        <div class="card-body text-center p-4">

                            <div
                                class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="
                                    width:70px;
                                    height:70px;
                                    background:linear-gradient(135deg,#6351a7,#362280);
                                    color:#fff;
                                ">

                                <i class="fa-solid fa-location-dot fs-3"></i>

                            </div>

                            <h5 class="fw-bold mb-3">
                                آدرس
                            </h5>

                            <p class="text-muted mb-0">
                                تهران، خیابان مثال، پلاک ۱۲۳
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        <div class="card-body text-center p-4">

                            <div
                                class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="
                                    width:70px;
                                    height:70px;
                                    background:linear-gradient(135deg,#6351a7,#362280);
                                    color:#fff;
                                ">

                                <i class="fa-solid fa-phone fs-3"></i>

                            </div>

                            <h5 class="fw-bold mb-3">
                                تلفن
                            </h5>

                            <p class="text-muted mb-0">
                                ۰۲۱-۱۲۳۴۵۶۷۸
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        <div class="card-body text-center p-4">

                            <div
                                class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="
                                    width:70px;
                                    height:70px;
                                    background:linear-gradient(135deg,#6351a7,#362280);
                                    color:#fff;
                                ">

                                <i class="fa-solid fa-envelope fs-3"></i>

                            </div>

                            <h5 class="fw-bold mb-3">
                                ایمیل
                            </h5>

                            <p class="text-muted mb-0">
                                info@asayar.ir
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- فرم تماس --}}
            <div class="card border-0 shadow-sm rounded-4 mb-5">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-0">

                        <i class="fa-solid fa-paper-plane text-primary ms-2"></i>

                        ارسال پیام

                    </h5>

                </div>

                <div class="card-body p-4">

                    <form wire:submit.prevent="send">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">
                                    نام و نام خانوادگی
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    wire:model.defer="name">

                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-bold">
                                    ایمیل
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    wire:model.defer="email">

                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            <div class="col-12 mb-3">

                                <label class="form-label fw-bold">
                                    موضوع
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    wire:model.defer="subject">

                                @error('subject')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            <div class="col-12 mb-3">

                                <label class="form-label fw-bold">
                                    متن پیام
                                </label>

                                <textarea
                                    rows="6"
                                    class="form-control"
                                    wire:model.defer="message">
                                </textarea>

                                @error('message')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                        </div>

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

                            <span
                                wire:loading.remove
                                wire:target="send">

                                <i class="fa-solid fa-paper-plane ms-1"></i>

                                ارسال پیام

                            </span>

                            <span
                                wire:loading
                                wire:target="send">

                                <span
                                    class="spinner-border spinner-border-sm ms-1">
                                </span>

                                در حال ارسال...

                            </span>

                        </button>

                    </form>

                </div>

            </div>

            {{-- نقشه --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="ratio ratio-16x9">

                    <iframe
                        src="https://www.google.com/maps?q=35.72321404458255,51.35866664060316&hl=fa&z=16&output=embed"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>

                </div>

            </div>

        </div>

    </div>

</div>
