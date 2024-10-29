<?php
// For the Route::get('/{lang}/adminpanel/{user_id}?/', '...')->name('user.profile');
// will return `/en/adminpanel/1`

$relativeUrl = url('user.profile', ['user_id' => 1, 'lang' => 'en'], true);
