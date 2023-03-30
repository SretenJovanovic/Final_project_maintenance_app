@extends('layouts.app')

@section('content')
        <div class="m-auto col-md-12 mt-2">
            <h4 class='text-center'>Holidays in next 365 days</h4>
            <table  class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Local Name</th>
                    </tr>
                </thead>
                <tbody id="tableHolidays">
                </tbody>
            </table>
        </div>


    
    <script>
        request = $.ajax({
            url: "https://date.nager.at/api/v3/NextPublicHolidays/RS",
            type: "get"
        });

        request.done(function(response, textStatus, jqXHR) {
            if (response) {
                
                let tableHolidays = document.getElementById('tableHolidays');
                response.forEach(holiday => {
                    const date = new Date(holiday['date']);
                    date.getFullYear();
                    tableHolidays.innerHTML += '<tr><th scope="row">'+holiday['date']+'</th><td>'+holiday['name']+'</td><td>'+holiday['localName']+'</td></tr>';
                });
            } else {
                console.log("Nema podataka" + response);
            }
        });
        request.fail(function(jqXHR, textStatus, error) {
            console.error("Desila se greska: " + textStatus, error);
        });
    </script>
@endsection
