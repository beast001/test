<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ICTA | Cert</title>
    <link rel="stylesheet" href="css/style2.css" media="all" />
</head>
<body>
@if($outcome_no==null)
    <header class="clearfix">
        <div id="logo">
            <img src="{{asset ('images/logo-ict-authority.png')}}">
        </div>
        <div id="company">
            <h2 class="name">ICT Authority</h2>
            <div>Teleposta Towers, 12th Flr,Kenyatta Ave, Nairobi, Kenya.</div>
            <div>P: (254) 20-211960/61</div>
            <div><a href="mailto:company@example.com">info@icta.go.ke</a></div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                @foreach($user_data as $user)
                    <div class="to">Issued TO:</div>
                    <h2 class="name">{{$user->name}}</h2>
                    <div class="address">796 Silver Harbour, TX 79273, US</div>
                    <div class="email"><a href="mailto:john@example.com">{{$user->email}}</a></div>
                @endforeach
            </div>
            <div id="invoice">
                <h1>Clearance Number Not Available</h1>
                <div class="date">Date of issue: not yet issued</div>
                <div class="date">Application Type: {{$status}}</div>
            </div>
        </div>
        <div id="thanks">Kindly be patient as we work through your application!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">This letter is validly issued by The Information and Communication Technology Authority </div>
        </div>
    </main>
    <footer>
        Cert was created on a computer and is valid without the signature and seal.
    </footer>



@else




    <header class="clearfix">
        <div id="logo">
            <img src="{{asset ('images/logo-ict-authority.png')}}">
        </div>
        <div id="company">
            <h2 class="name">ICT Authority</h2>
            <div>Teleposta Towers, 12th Flr,Kenyatta Ave, Nairobi, Kenya.</div>
            <div>P: (254) 20-211960/61</div>
            <div><a href="mailto:company@example.com">info@icta.go.ke</a></div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">Issued TO:</div>
                <h2 class="name">{{$user_data->name}}</h2>
                <div class="address">796 Silver Harbour, TX 79273, US</div>
                <div class="email"><a href="mailto:john@example.com">{{$user_data->email}}</a></div>
            </div>
            <div id="invoice">
                <h1>{{$outcome->cert}}</h1>
                <div class="date">Date of Issue: {{$outcome->created_at}}</div>
                <div class="date">Application Type: {{$status}}</div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th class="no">#</th>
                <th class="desc">Info</th>
                <th class="unit">Status</th>
                <th class="qty">date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="no">01</td>
                <td class="desc"><h3>Clearance letter Approval</h3>The clearance letter application for the above applicant has beeen approved and can be validate by tracking the certificat number</td>
                <td class="unit">Approved</td>
                <td class="qty">30/11/2019</td>

            </tr>

            </tbody>
        </table>
        <div id="thanks">Welcome to Kenya!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">This letter is validly issued by The Information and Communication Technology Authority </div>
        </div>
    </main>
    <footer>
        Cert was created on a computer and is valid without the signature and seal.
    </footer>
@endif
</body>


<script type="text/javascript">
    window.print();
</script>

</html>

