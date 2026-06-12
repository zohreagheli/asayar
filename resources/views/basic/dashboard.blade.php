@extends('basic/layout/master')

@section('content')

<div class="dashboard-background no-blur">
    <div class="app-content">
        <div class="container py-4">

            {{-- خوش آمدگویی --}}
            <div class="welcome-card mb-4">

                <div>
                    <h3 class="fw-bold mb-2">
                        سلام {{ auth()->user()->name }}
                    </h3>

                    <p class="mb-0 opacity-75">
                        به پنل کاربری آسایار خوش آمدید
                    </p>
                </div>

                <div class="welcome-icon">
                    <i class="fe fe-user"></i>
                </div>

            </div>

            {{-- آمار --}}
            <div class="row g-3 mb-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="fe fe-file-text stat-icon"></i>

                        <h3>
                            12
                        </h3>

                        <span>
                            درخواست ثبت شده
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="fe fe-clock stat-icon"></i>

                        <h3>
                            3
                        </h3>

                        <span>
                            درخواست فعال
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="fe fe-message-circle stat-icon"></i>

                        <h3>
                            5
                        </h3>

                        <span>
                            پیام پشتیبانی
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="fe fe-award stat-icon"></i>

                        <h3>
                            187
                        </h3>

                        <span>
                            روز عضویت
                        </span>
                    </div>
                </div>

            </div>

            {{-- عملیات سریع --}}
            <div class="row g-4">

                <div class="col-lg-3 col-md-4 col-6">
                    <button
                        onclick="window.location='{{ route('user.technicians') }}'"
                        class="glass-btn">

                        <i class="fe fe-users"></i>

                        <span class="btn-text">
                            سرویسکاران
                        </span>

                    </button>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <button
                        onclick="window.location='{{ route('support') }}'"
                        class="glass-btn">

                        <i class="fe fe-headphones"></i>

                        <span class="btn-text">
                            پشتیبانی آنلاین
                        </span>

                    </button>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <button
                        onclick="window.location='{{ route('gallery') }}'"
                        class="glass-btn">

                        <i class="fe fe-image"></i>

                        <span class="btn-text">
                            گالری تصاویر
                        </span>

                    </button>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <button
                        onclick="window.location='{{ route('contact') }}'"
                        class="glass-btn">

                        <i class="fe fe-phone"></i>

                        <span class="btn-text">
                            تماس با ما
                        </span>

                    </button>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <button
                        onclick="window.location='{{ route('about') }}'"
                        class="glass-btn">

                        <i class="fe fe-info"></i>

                        <span class="btn-text">
                            درباره ما
                        </span>

                    </button>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <button
                        onclick="window.location='{{ route('appointments.create') }}'"
                        class="glass-btn">

                        <i class="fe fe-plus-circle"></i>

                        <span class="btn-text">
                            ثبت درخواست
                        </span>

                    </button>
                </div>

            </div>

            {{-- آخرین فعالیت‌ها --}}
            <div class="activity-card mt-5">

                <div class="activity-header">

                    <i class="fe fe-activity"></i>

                    <span>
                        آخرین فعالیت‌ها
                    </span>

                </div>

                <ul class="activity-list">

                    <li>
                        <i class="fe fe-check-circle"></i>
                        درخواست سرویس ثبت شد
                    </li>

                    <li>
                        <i class="fe fe-check-circle"></i>
                        سرویسکار تعیین شد
                    </li>

                    <li>
                        <i class="fe fe-check-circle"></i>
                        پیام جدید از پشتیبانی
                    </li>

                    <li>
                        <i class="fe fe-check-circle"></i>
                        درخواست شما تکمیل شد
                    </li>

                </ul>

            </div>

        </div>
    </div>
</div>

<style>

.welcome-card{
    background:linear-gradient(
        135deg,
        #6351a7 0%,
        #362280 100%
    );

    border-radius:25px;

    padding:35px;

    color:white;

    display:flex;

    justify-content:space-between;

    align-items:center;

    box-shadow:
        0 15px 40px rgba(99,81,167,.25);
}

.welcome-icon{

    width:90px;
    height:90px;

    border-radius:50%;

    background:rgba(255,255,255,.15);

    display:flex;

    align-items:center;

    justify-content:center;
}

.welcome-icon i{
    font-size:40px;
}

.stat-card{

    background:white;

    border-radius:20px;

    padding:25px;

    text-align:center;

    box-shadow:
        0 8px 25px rgba(0,0,0,.08);

    transition:.3s;
}

.stat-card:hover{

    transform:translateY(-5px);

    box-shadow:
        0 15px 35px rgba(99,81,167,.18);
}

.stat-icon{

    font-size:30px;

    color:#5e42a6;

    margin-bottom:10px;
}

.stat-card h3{

    font-weight:bold;

    color:#362280;
}

.glass-btn{

    width:100%;

    min-height:140px;

    border:none;

    background:white;

    border-radius:24px;

    box-shadow:
        0 8px 25px rgba(0,0,0,.08);

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    gap:12px;

    transition:.3s;
}

.glass-btn:hover{

    transform:translateY(-6px);

    box-shadow:
        0 18px 40px rgba(99,81,167,.2);
}

.glass-btn i{

    font-size:38px;

    color:#5e42a6;
}

.btn-text{

    font-weight:700;

    color:#444;
}

.activity-card{

    background:white;

    border-radius:24px;

    padding:25px;

    box-shadow:
        0 8px 25px rgba(0,0,0,.08);
}

.activity-header{

    display:flex;

    align-items:center;

    gap:10px;

    color:#5e42a6;

    font-size:20px;

    font-weight:bold;

    margin-bottom:20px;
}

.activity-list{

    list-style:none;

    padding:0;

    margin:0;
}

.activity-list li{

    padding:12px 0;

    border-bottom:1px solid #eee;

    display:flex;

    align-items:center;

    gap:10px;
}

.activity-list li:last-child{
    border-bottom:none;
}

.activity-list i{
    color:#28a745;
}

</style>

@endsection
