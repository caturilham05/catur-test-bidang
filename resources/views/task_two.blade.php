@if (!empty($get_data_types))
    <h1>Hasil Soal 2 A</h1>
    <pre>
        @php
            print_r($get_data_types);
        @endphp
    </pre>
@elseif (!empty($element_exists))
    <h1>Hasil Soal 2 B</h1>
    <h3>Hasilnya Adalah : {{$element_exists}}</h3>
@elseif (!empty($element_key))
    <h1>Hasil Soal 2 C</h1>
    <h3>Hasilnya Adalah : {{$element_key}}</h3>
@endif
