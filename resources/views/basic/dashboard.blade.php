@extends('basic/layout/master')
@section('content')
    <div class="dashboard-background no-blur">
        <div class="app-content">

            <!-- کارت ۱ -->
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{ route('admin.appointments.chart') }}" class="dashboard-card clear-card">
                        <div class="dashboard-card-content">
                            <h4>چند وقته آسایاری شدی؟</h4>
                        </div>
                    </a>
                </div>
            </div>

            <!-- کارت ۲ زیر لوگو سمت چپ -->
            <div class="row mt-5 d-flex justify-content-end">
                <div class="col-lg-3">
                    <a href="{{ route('user.technicians') }}" class="dashboard-card clear-card">
                        <div class="dashboard-card-content">
                            <h4>با کدام یک از همکاران ما آشنایی داری؟</h4>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
