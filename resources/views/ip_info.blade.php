<html>
    <head>
        <title>IP INFO </title>
    </head>
    <body>
        <h3>Your IP Information </h3>
        <p>IP Address : {{$ip}} </p>
        <p>City : {{$cityName}} </p>
        <p>State : {{$countryName}} </p>

        <h3>Cookies Information </h3>
        <p>Cookies IP Address : {{request()->cookie('ip_address')}} </p>
        <p>Cookies City : {{request()->cookie('cityName')}} </p>
        <p>Cookies State : {{request()->cookie('countryName')}} </p>
    </body>
<html>