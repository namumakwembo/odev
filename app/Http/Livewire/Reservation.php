<?php

namespace App\Http\Livewire;

use App\Models\Reservation as ModelsReservation;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class Reservation extends Component
{

    use Actions;

    public $start1;
    public $start2;
    public $start3;
    public $end1;
    public $end2;
    public $end3;

    public $dateType;
    public $attendee_count;
    public $request;
    public $date;
    public $first_name;
    public $last_name;


    //Error messages
    protected $messages=[

        'dateType.required'=>'Tarihi Secmelisiniz',
        'attendee_count.required'=>'Kisi sayisi Girmelisiniz',
    ];


    public function submit()
    {


        //validate 
        $this->validate([

            'request'=>'nullable',
            'dateType'=>'required',
            'attendee_count'=>'required',
        ]);


        //set Date 
        switch ($this->dateType) {

                case '1':
                $date= $this->start1->format('d M Y').' - '.$this->end1->format('d M Y');
                break;

                case '2':
                $date= $this->start2->format('d M Y').' - '.$this->end2->format('d M Y');
                break;

                case '3':
                $date= $this->start3->format('d M Y').' - '.$this->end3->format('d M Y');
                break;
            
            default:
                # code...
                break;
        }


        //Randevu kaydet 
        ModelsReservation::create([
            'user_id'=>Auth()->user()->id,
            'date'=>$date,
            'attendee_count'=>$this->attendee_count,
            'request'=>$this->request,
        ]);


        $this->reset('request','date','dateType','attendee_count');
        $this->notification()->success('Rezervasyon Alindi!');


    }



    public function mount()
    {
        Carbon::setlocale(config('app.locale'));
        $today = Carbon::today();

        // First date range
        $this->start1 = $today->copy()->addDays(3);
        $this->end1 = $this->start1->copy()->addDays(5);

        // Second date range
        $this->start2 = $this->end1->copy()->addDay();
        $this->end2 = $this->start2->copy()->addDays(4);

        // Third date range
        $this->start3 = $this->end2->copy()->addDay();
        $this->end3 = $this->start3->copy()->addDays(6);

    }

    public function render()
    {
        return view('livewire.reservation');
    }
}
