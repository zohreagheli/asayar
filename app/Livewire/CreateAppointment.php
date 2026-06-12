<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Service;
use Livewire\Component;
use Livewire\Attributes\Layout;


class CreateAppointment extends Component
{

    public $services = [];

    public $service_id;

    public $date;

    public $time;

    public $address;

    public $description;

    protected $rules = [

        'service_id' => 'required|exists:services,id',

        'date' => 'required',

        'time' => 'required',

        'address' => 'required|min:10',

        'description' => 'nullable|max:1000',
    ];

    protected $messages = [

        'service_id.required' => 'انتخاب خدمت الزامی است',

        'date.required' => 'تاریخ را انتخاب کنید',

        'time.required' => 'بازه زمانی را انتخاب کنید',

        'address.required' => 'آدرس الزامی است',

        'address.min' => 'آدرس باید حداقل ۱۰ کاراکتر باشد',
    ];
    public $pageTitle = 'ثبت درخواست سرویس';

    public $breadcrumbs = [
        [
            'title' => 'داشبورد',
            'url' => '/dashboard'
        ],
        [
            'title' => 'ثبت درخواست سرویس',
            'url' => null
        ]
    ];


    public function mount()
    {
        $this->services = Service::orderBy('name')->get();
    }

    public function save()
    {
        $this->validate();

        Appointment::create([

            'user_id' => auth()->id(),

            'service_id' => $this->service_id,

             'preferred_date' => to_gregorian($this->date),

            'preferred_time' => $this->time,

            'address' => $this->address,

            'description' => $this->description,

            'status' => 'pending',
        ]);

$this->dispatch('show-toast',
        message:'درخواست شما با موفقیت ثبت شد',
        type: 'success'
    );


        $this->reset([
            'service_id',
            'date',
            'time',
            'address',
            'description'
        ]);
    }

    public function render()
    {
        return view('livewire.create-appointment')->layout('layouts.lay', [
            'pageTitle'   => $this->pageTitle,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }
}
