<div class="container py-5">

    <h2 class="text-center mb-5" style="color: #5e42a6;">📞 تماس با ما</h2>

    <div class="row">

        <!-- کارت‌های اطلاعات شرکت -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0" style="background-color: #e6e0ff;">
                <div class="card-body text-center">
                    <i class="fa fa-map-marker fa-3x mb-3 text-dark"></i>
                    <h5 class="card-title" style="color: #5e42a6;">آدرس</h5>
                    <p class="card-text">تهران، خیابان مثال، پلاک ۱۲۳</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0" style="background-color: #e6e0ff;">
                <div class="card-body text-center">
                    <i class="fa fa-phone fa-3x mb-3 text-dark"></i>
                    <h5 class="card-title" style="color: #5e42a6;">تلفن</h5>
                    <p class="card-text">۰۲۱-۱۲۳۴۵۶۷۸</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0" style="background-color: #e6e0ff;">
                <div class="card-body text-center">
                    <i class="fa fa-envelope fa-3x mb-3 text-dark"></i>
                    <h5 class="card-title" style="color: #5e42a6;">ایمیل</h5>
                    <p class="card-text">info@company.com</p>
                </div>
            </div>
        </div>

    </div>


    <!-- فرم تماس -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-6 col-md-8">
              <div class="card shadow-sm" style="background-color: #f5f0ff; border: 1px solid #d3caff;">
            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <form wire:submit.prevent="send" class="shadow-sm p-4 border rounded bg-white" novalidate>
                <div class="mb-3">
                    <label>نام</label>
                    <input type="text" class="form-control" wire:model.defer="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label>ایمیل</label>
                    <input type="text" class="form-control" wire:model.defer="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label>موضوع</label>
                    <input type="text" class="form-control" wire:model.defer="subject">
                    @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label>پیام شما</label>
                    <textarea class="form-control" wire:model.defer="message" rows="5"></textarea>
                    @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">ارسال پیام</button>
            </form>
        </div>
    </div>
 </div>
    <!-- نقشه گوگل مپ -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="ratio ratio-16x9 shadow-sm rounded">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1361.8831067984463!2d51.35866664060316!3d35.72321404458255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1761907759809!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>

            </div>
        </div>
    </div>
</div>
