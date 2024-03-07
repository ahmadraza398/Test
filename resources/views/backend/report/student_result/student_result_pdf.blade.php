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

                    <img src="{{ url('upload/logo.png') }}" style="width: 120px; height:120px;">
                </h2>
            </td>
            <td>
                <h2>School Name</h2>
                <p>Address: Punjab, Pakistan</p>
                <p>Phone : 055-4293228</p>
                <p>Email : afaq.6flicks@gmail.com</p>
                <p><b>Student Result Report</b></p>
            </td>
        </tr>

    </table>
    <br><br>
    <strong> Result Of: </strong> {{ $allData['0']['exam_type']['name'] }}
    <table id="customers">
        <tr>
            <td width="50%">
                <h4>Year/Session: </h4>{{ $allData['0']['year']['name'] }}
            </td>
            <td width="50%">
                <h4>Class</h4>{{ $allData['0']['student_class']['name'] }}
            </td>
        </tr>

    </table>

    <br>
    <i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>
    <hr style="border: dashed 2px; width:95%; color:#000000; margin-bottom: 50px;">

</body>

</html>

</html>