<head>
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans|Pacifico&display=swap" rel="stylesheet">
</head>
<body style="margin-left:80px;background-size:100%;background-repeat:no-repeat;background-image:url(https://c1.sfdcstatic.com/content/dam/blogs/ca/Blog%20Posts/digital-direct-mail-header.png)">
    <div style="font-size:25px;color:teal;font-family:'Pacifico',cursive;">
      <h2>  Welcome to StGeorgeITD </h2>
      </div>
    <div style="font-size:35px;">
        تم إلغاء الحجز 
        <br>
        يوم :  {{$booking->day}} 
        <br>
        من :{{$booking->from}} 
        <br>
        الى : {{$booking->to}} 
        <br>
        <div style="font-size:25px;font-weight:bold;">
            السبب : 
            <br>
            {{$reason}} 
            <br>
            <a href="http://stgeorgeitd.tk">برجاء الذهاب الى الموقع و اختيار مكان اخر</a>
        </div>
    </div>
</body>