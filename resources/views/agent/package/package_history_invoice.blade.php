<!DOCTYPE html>
<html xml:lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoa Don</title>

<style type="text/css">
    *{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td {
        font-weight: bold;
        font-size: x-small
    }
    .gray{
        background-color: lightgray;
    }
    .font {
        font-size: 15px;
    }
    .authority {
        float: right;
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        margin-left: 35px;
    }
    .thanks p {
        color: green;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }


</style>
</head>
<body>

    <table width="100%" style="background: #f7f7f7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <h2 style="color: green; font-size: 26px;"><strong>Dragon Mobile</strong></h2>

            </td>
            <td align="right">
                <pre>
                    Pham Viet Long
                    Email: long8bvv@gmail.com
                    SĐT/ZALO: 0395940171
                    Dia chi: Chuong My - Ha Noi
                </pre>

            </td>
        </tr>
    
    </table>
    <table width="100%" style="background: #fff; padding:2px;"></table>
    <table width="100%" style="background: #f7f7f7; padding: 0 5 0 5px" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Ten:</strong> {{ $packagehistory->user->name }} <br>
                    <strong>Email:</strong> {{ $packagehistory->user->email }} <br>
                    <strong>SDT:</strong> {{ $packagehistory->user->phone }} <br>
                    <strong>Dia chi:</strong> {{ $packagehistory->user->address }}<br>
                </p>
            </td>
            <td>
                <p class="font">
                    <h3><span style="color: green;">Ma Hoa Don: {{ $packagehistory->invoice }}</h3>
            Ngay mua: {{ $packagehistory->created_at }}<br>
            Hinh thuc thanh toan: Chuyen Khoan</span>
                </p>
            </td>

        </tr>
    </table>
</br>
        <h3>Goi Hang</h3>

        <table width="100%">
            <thead style="background: green; color:#FFF;">
                <tr class="font">
                    <th>Ten Goi hang</th>
                    <th class="text-end">So luong</th>
                    <th class="text-end">Gia ban dau</th>
                    <th class="text-end">Tong thanh toan</th>
                </tr>
            </thead>
            <tbody>
                <tr class="font">
                    <td align="center">{{ $packagehistory->package_name }}</td>
                    <td align="center">{{ $packagehistory->package_credits }}</td>
                    <td align="center">{{ $packagehistory->package_amount }}</td>
                    <td align="center">{{ $packagehistory->package_amount }}</td>

                </tr>
            </tbody>
        </table>

        <div class="thanks mt-3">
            <p>Cam on ban da ung ho chung toi, chuc ban co mot ngay tot lanh </p>
        </div>
        <div class="authority float-right mt-5">
            <p>--------------------------------------------------</p>
            <h5>Ky ten (Ky, ghi ro ho ten)</h5>
        </div>
    
</body>
</html>