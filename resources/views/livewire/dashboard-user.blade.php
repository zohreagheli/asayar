<div>

    <div class="container-fluid">

        {{-- خوش آمدگویی --}}
        <div class="row g-4 mb-4">

            <div class="col-xl-8">

                <div class="welcome-card">

                    <div>

                        <h2 class="fw-bold mb-2">
                            سلام {{ auth()->user()->name }}
                        </h2>

                        <p class="mb-0 opacity-75">
                            به پنل کاربری آسایار خوش آمدید
                        </p>

                    </div>

                    <div class="welcome-icon">

                        <i class="fe fe-user"></i>

                    </div>

                </div>

            </div>

            <div class="col-xl-4">

                <div class="mini-info-card">

                    <div class="mini-info-icon">

                        <i class="fe fe-award"></i>

                    </div>

                    <div>

                        <h4 class="mb-1">
                            {{ $membershipDays }}
                        </h4>

                        <small>
                            روز عضویت در آسایار
                        </small>

                    </div>

                </div>

            </div>

        </div>


        <div class="row g-4 mb-4">

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <i class="fe fe-file-text stat-icon"></i>

                    <h3>{{ $appointmentsCount }}</h3>

                    <span>
                        درخواست ثبت شده
                    </span>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <i class="fe fe-clock stat-icon"></i>

                    <h3>{{ $activeAppointments }}</h3>

                    <span>
                        درخواست فعال
                    </span>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <i class="fe fe-message-circle stat-icon"></i>

                    <h3>{{ $messagesCount }}</h3>

                    <span>
                        پیام پشتیبانی
                    </span>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <i class="fe fe-check-circle stat-icon"></i>

                    <h3>{{ $latestAppointments->count() }}</h3>

                    <span>
                        آخرین درخواست‌ها
                    </span>

                </div>

            </div>

        </div>
        {{-- عملیات سریع --}}
        <div class="row g-4 mb-5">

            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('appointments.create') }}" class="glass-btn">
                    <i class="fe fe-plus-circle"></i>
                    <span>ثبت درخواست</span>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('user.technicians') }}" class="quick-card">
                    <i class="fe fe-users"></i>
                    <span>سرویسکاران</span>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('support') }}" class="quick-card">
                    <i class="fe fe-headphones"></i>
                    <span>پشتیبانی آنلاین</span>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('gallery') }}" class="quick-card">
                    <i class="fe fe-image"></i>
                    <span>گالری تصاویر</span>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('contact') }}" class="quick-card">
                    <i class="fe fe-phone"></i>
                    <span>تماس با ما</span>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('about') }}" class="quick-card">
                    <i class="fe fe-info"></i>
                    <span>درباره ما</span>
                </a>
            </div>

        </div>
        {{-- آخرین درخواست ها --}}
        <div class="dashboard-box">

            <div class="dashboard-box-header">

                <i class="fe fe-activity ms-2"></i>

                آخرین درخواست‌های شما

            </div>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>سرویس</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($latestAppointments as $appointment)
                            <tr>

                                <td>
                                    {{ $appointment->service?->name ?? 'نامشخص' }}
                                </td>

                                <td>

                                    <span class="badge bg-{{ $appointment->status->badge() }}">
                                        {{ $appointment->status->label() }}
                                    </span>

                                </td>

                                <td>
                                    {{ verta($appointment->created_at)->format('Y/m/d') }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3" class="text-center py-4">

                                    هنوز هیچ درخواستی ثبت نشده است

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

    <style>
        .welcome-card {
            background: linear-gradient(135deg, #6351a7, #362280);
            border-radius: 25px;
            padding: 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            box-shadow: 0 15px 40px rgba(99, 81, 167, .25);
        }

        .welcome-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .15);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-icon i {
            font-size: 35px;
        }

        .mini-info-card {
            background: white;
            border-radius: 25px;
            height: 100%;
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }

        .mini-info-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #f3efff;
            color: #5e42a6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-card {
            background: linear-gradient(135deg,
                    #ffffff 0%,
                    #f7f4ff 100%);

            border: 1px solid #ece5ff;

            border-radius: 20px;

            padding: 25px;

            text-align: center;

            transition: .3s;

            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 32px;
            color: #5e42a6;
            margin-bottom: 10px;
        }

        .quick-card{
    width:100%;
    min-height:160px;

    background:#fff;

    border-radius:24px;

    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;

    gap:10px;

    text-decoration:none;

    position:relative;
    overflow:hidden;

    transition:.35s ease;

    box-shadow:
        0 8px 25px rgba(0,0,0,.08);
}

.quick-card::before{
    content:'';

    position:absolute;
    inset:0;

    background:linear-gradient(
        135deg,
        #6351a7 0%,
        #4f3b9f 40%,
        #7d67d9 100%
    );

    opacity:0;

    transition:.35s ease;
}

.quick-card i,
.quick-card span,
.quick-card small{
    position:relative;
    z-index:2;
}

.quick-card i{
    font-size:42px;
    color:#5e42a6;
}

.quick-card span{
    font-weight:700;
    color:#444;
}

.quick-card small{
    color:#888;
}

.quick-card:hover{
    transform:translateY(-8px);

    box-shadow:
        0 20px 45px rgba(99,81,167,.25);
}

.quick-card:hover::before{
    opacity:1;
}

.quick-card:hover i,
.quick-card:hover span,
.quick-card:hover small{
    color:#fff;
}

        .dashboard-box {
            background: white;
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }

        .dashboard-box-header {
            color: #5e42a6;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 18px;
        }
    </style>
</div>
