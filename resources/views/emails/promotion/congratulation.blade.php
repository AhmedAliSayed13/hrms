@component('mail::message')
# Congratulations {{ $promotion->employee->name }} 🎉

We are pleased to inform you that you have been promoted from  
**{{ $promotion->old_designation }}** to **{{ $promotion->new_designation }}**.

Your new salary is **{{ number_format($promotion->new_salary, 2) }}** effective from  
**{{ \Carbon\Carbon::parse($promotion->date_of_promotion)->format('F d, Y') }}**.

Keep up the great work!

@component('mail::button', ['url' => url('/dashboard')])
View Dashboard
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
