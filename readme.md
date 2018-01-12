Try it online at https://barbershop11.herokuapp.com/

The objective of this challenge was, beyond further familiarizing myself with PHP and Laravel, to create a simple app for a barbershop. Barbers can register and log in (using Laravel's built-in Auth), edit/update their profile (with flash notifications), and remove a customer from the front of the queue.

Customers are anonymous and do not login; they simply add themselves to the end of the queue by putting their name down. Wait time is calculated for each customer depending on how many people are in front of them and what kind of cut they're receiving (haircut, shave, or both).

A stretch feature I would've liked to add would be allowing for multiple barbers to work at the same time, so each would have their own queue of customers. Maybe later!

Made with Laravel.

<img src='https://github.com/iwpeifer/BarberShop/blob/master/public/images/SS1.png?raw=true'/>
<img src='https://github.com/iwpeifer/BarberShop/blob/master/public/images/SS2.png?raw=true'/>
<img src='https://github.com/iwpeifer/BarberShop/blob/master/public/images/SS3.png?raw=true'/>
