<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <table id="customers">
        <tr>
            <td>
                <h2>
                    <?php $image_path = '/upload/logo.png'; ?>
                    <img src="{{ public_path() . $image_path }}" width="200" height="100">
                </h2>
            </td>
            <td>
                <h2>School Name</h2>
                <p>Address: Punjab, Pakistan</p>
                <p>Phone : 055-4293228</p>
                <p>Email : afaq.6flicks@gmail.com</p>
                <p><b>Employee Monthly Salary</b></p>
            </td>
        </tr>

    </table>
<br><br>
<strong> Employee Name: </strong> {{ $allData['0']['user']['name'] }} <br>
<strong> ID No: </strong> {{ $allData['0']['user']['id_no'] }} <br>
<strong> Mobile: </strong> {{ $allData['0']['user']['mobile'] }} <br>
<strong> Month: </strong> {{ $month }}
    <table id="customers">
        <tr>
            <td width="50%"><h4>Date</h4></td>
            <td width="50%"><h4>Attendance Status</h4></td>
        </tr>
        @foreach($allData as $value)
        <tr>
            <td width="50%">{{ date('d-m-Y',strtotime($value->date)) }}</td>
            <td width="50%">{{ $value->attend_status }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2"><strong>Total Absents: </strong>{{ $absents }}</td>
        </tr>
        <tr>
            
        <td colspan="2"><strong>Total Leaves: </strong>{{ $leaves }}</td>
        </tr>
    </table>

    <br>
    <i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>
    <hr style="border: dashed 2px; width:95%; color:#000000; margin-bottom: 50px;">

</body>

</html>