<!doctype html>
<html lang="en">
  <head>
</head>
<body>
  <div class="container">
    <div class="alert alert-success" role="alert">

    <h3> Hiii </h3>
    
    <p> Registration Successfully </p>
   


    <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px">
    <tbody>
      <tr>
        <td width="8" style="width:8px">
  </td>
  <td>
    <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px" align="center" class="m_-1258784988569922633mdv2rw">
    <div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;padding-bottom:32px;text-align:center;word-break:break-word">
    <div style="font-size:24px">
    <table style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:24px;line-height:28px;text-align:center;width:100%">
    <tbody>
   
            @foreach($users as $user)
               <td style="font-family:inherit">Verify 
               <a href="mailto:{{ $user->email }}" target="_blank">{{ $user->email }}</a> as your &nbsp;email
               </td>
            @endforeach 
     
          </tr>
        </tbody>
      </table> 
    </div>
          <table align="center" style="margin-top:8px">
          <tbody>
            <tr style="line-height:normal">
            <td align="right" style="padding-right:8px">
            <img width="20" height="20" style="width:20px;height:20px;vertical-align:sub;border-radius:50%" src="https://lh3.googleusercontent.com/a/AATXAJxf_8odoYCKmZbmMlCldMslKfV0-tUA0Sv13S4s=s96" alt="" class="CToWUd">
          </td>
          <td>
            <a style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px">pandiaraj.ninosit@gmail.com</a>
          </td>
        </tr>
      </tbody>
    </table> 
  </div>
  <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
  <table style="font-size:14px;letter-spacing:0.2;line-height:20px;text-align:center">
  <tbody>
    <tr>
      <td style="padding-bottom:24px;text-align:start">
      <table>
        <tbody>
          <tr>
            <td style="vertical-align:top">
            <img width="66" height="66" src="https://ci4.googleusercontent.com/proxy/YdJSRvCzBNjNMC9cfiH9uVsX-4gKFXBcWUY7mMyMlIS3bK1x-eoNyQm3q8dUc636oPziwcrY4_u8HHldUib9RFX4TLRp0g0C6fMpAIDCE4VJZXUh=s0-d-e1-ft#https://www.gstatic.com/accountalerts/email/recovery_email_4x.png" style="width:66px;height:66px;margin-top:2px" class="CToWUd"></td>
    <td style="font-size:14px;letter-spacing:0.2;line-height:20px;padding-left:3%">Verifying your email will confirm it’s an active email that belongs to you.
    <div style="height:13px"></div> 
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
  <td>
    <a href="http://127.0.0.1:8000/" style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:13px;display:inline-block;padding:6px 24px;background-color:#4184f3;border-radius:5px;min-width:90px" target="_blank" data-saferedirecturl="http://127.0.0.1:8000/">Confirm to Login</a>
    </td>
  </tr>
  <tr style="color:rgba(0,0,0,0.54);font-size:12px;line-height:150%;text-align:center">
  <td style="padding-top:12px">You can also go directly to:<br>
  <a class="http://127.0.0.1:8000/" style="color:rgba(0,0,0,0.87);text-decoration:inherit">http://127.0.0.1:8000/<wbr>login/email</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</td>
<td width="8" style="width:8px"></td>
</tr>
</tbody>
</table>
    </div>
  </div>
</body>
</html>
