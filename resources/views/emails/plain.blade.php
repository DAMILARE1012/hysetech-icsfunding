<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!--[if gte mso 12]>
> <style type="text/css">
> [a.btn {
	padding:15px 22px !important;
	display:inline-block !important;
}]
> </style>
> <![endif]-->
        <title>ICS Funding</title>
    </head>
<body>
<!--[if mso]>
<style type="text/css">
    body, table, td, a, span {
        font-family: Arial, Helvetica, sans-serif !important;
    }
</style>
<![endif]-->
<h3>{{$subject}}</h3>
{!! $body !!}
@if(isset($attachment))
    <div style="margin-top: 50px">
        <a href="{{$attachment}}" style="padding: 5px;background-color: deepskyblue;color: white;">
            Download Attachment
        </a>
    </div>
@endif
</body>
</html>
