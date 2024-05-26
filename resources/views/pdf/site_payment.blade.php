<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        td,
        th {
             border: 1px solid #acacac;
             *text-align: left;
        }

        table {
             border-collapse: collapse;
             *width: 100%;
        }

        th,
        td {
             padding: 0px;
             font-size: 15px;
        }
    </style>
</head>

<body>

    <center>
        <h5>    Brahmaputra  trading  Corporation  <br>
                   Payment Summary by Site <br>
                Site  Name: {{$data->max('site_name')}}
        </h5>
    </center>

    <table>

        <tr>
            <th align="left" width="70">Date</th>
            <th align="left" width="230">Payment Category </th>
            <th align="right" width="60">Amount</th>
            <th align="center" width="160">Site  Name</th>   
        </tr>

     @foreach($data as $row)
        <tr>
             <td align="left"> {{$row->date}} </td>
             <td align="left"> {{$row->pcategory_name}} {{$row->reff}} </td>
             <td align="right"> {{$row->amount}}TK </td>
             <td align="left">  {{$row->site_name}} </td>  
        </tr>
    @endforeach

         <tr>
            <td  colspan="2"  align="left">  Total Amount  </td>
            <td  colspan="2"  align="left">  {{ $data->sum('amount') }} TK  </td>  
         </tr>

    </table>

</body>

</html>