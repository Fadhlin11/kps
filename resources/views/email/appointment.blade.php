Hello {{ $mailData['name'] }},
<br>
Your appointment details:
<br>
Date: {{ $mailData['date'] }}
<br>
Slot: {{ $mailData['slot'] }}
<br>
Dentist: {{ $mailData['dentistName'] }}