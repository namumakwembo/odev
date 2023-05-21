<?php

namespace App\Http\Livewire;

use App\Models\ContactLead;
use Livewire\Component;
use WireUi\Traits\Actions;

class ContactUs extends Component
{
    use Actions;

    public $name;
    public $message;
    public $email;


    public function submit()
    {

        $this->validate([
            'name'=>'required',
            'message'=>'required|max:1000',
            'email'=>'required|email',
        ]);



  

        ContactLead::create([
            'name'=>$this->name,
            'message'=>$this->message,
            'email'=>$this->email,

        ]);

        $this->reset();

       // dd('her');

        $this->notification()->success('Saved successfully','Your message has been received , we will respond to you soon');


    }


    public function render()
    {
        return view('livewire.contact-us');
    }
}
