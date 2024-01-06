<!DOCTYPE html>
<html>
<head>
    <title>Not planned Requistion Review</title>
</head>
    <style>
        p{
            text-align: justify;
        }
    </style>
<body>    
    <h3> Dear {{$username}}, </h3>

    <p> I trust this message finds you well. I am writing to you Informing you that the below rasied requistion which was raisedbut not planned on the procurement has been rejected.</p>

    <p> <span style="font-weight: bold">Requistion Details :</span></p>

    <ol>
        <li>Description :{{$description}}</li>
        <li>QTY : {{$qty}}</li>
        <li>Amount required : {{$amount_needed}}</li>
        <li>Reason for purchase : {{$reason_for_purchase}}</li>
        <li>Status : Rejected </li>
    </ol>
    
    <p>The following is the link to accomplish the task : http://127.0.0.1:8000/admin-login</p>
    
    <p>Thank you for your cooperation and timely attention to this important matter. We look forward to receiving the requested information and moving forward with the next steps in the requistion process.</p>

    <p> Best regards, </p>

    <p>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  </p>

    <p>Please do not reply to this email, its auto-generated from COMESA E-Procurement System.</p>
    
</body>
</html>