@extends('email')
<?php use Admailer\Models\SiteSettings; ?>
@section('content')
	
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="background-table">
<tbody>
<tr>
<td align="center" bgcolor="#f2f2f2">
<table class="w640" style="margin:0 10px;" width="640" cellpadding="0" cellspacing="0" border="0">
<tbody>
<tr>
<td class="w640" width="640" height="20"></td>
</tr>
<tr>
<td class="w640" width="640" height="30" bgcolor="#ffffff"></td>
</tr>
<tr id="simple-content-row">
<td class="w640" width="640" bgcolor="#ffffff">
    <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
        <tbody>
        <tr>
            <td class="w30" width="30"></td>
            <td class="w580" width="580">
                <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                    <tr>
                        <td class="w580" width="580">
                            <div align="left" class="article-content">
                                <multiline label="Description">
                                    Dear {{ $user->username }},
                                    <br/>
                                    <br/>
                                    A request to change your password has been made. If you made this request, please follow the instructions below. Otherwise, you can safely ignore this email and we assure you that your account is safe.
                                </multiline>
                            </div></td>
                    </tr>
                    <tr>
                        <td class="w580" width="580" height="10"></td>
                    </tr>
                    </tbody>
                </table>
        </tr>

        <tr>
            <td class="w30" width="30"></td>
            <td class="w580" width="580">
                <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                    <tr>
                        <td class="w275" width="275">
                            <div align="left" class="article-content">
                                <singleline label="Description">
                                    <strong>Click the following link to reset your password:</strong>
                                </singleline>
                            </div>
                            <div align="left" class="article-content">
                                <singleline label="Description">
                                   <p style="margin-top: 0;color: #565656;font-family: sans-serif;font-size: 16px;line-height: 25px;margin-bottom: 25px">
								        Click <a href="{{ url('password/reset/'.$token) }}">here</a> to reset your password.
								    </p>
                                </singleline>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w580" width="580" height="10"></td>
                    </tr>
                    </tbody>
                </table>
        </tr>

        <tr>
            <td class="w30" width="30"></td>
            <td class="w580" width="580">
                <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                    <!-- <tr>
                        <td class="w580" width="580">
                            <div align="left" class="article-content">
                                <multiline label="Description">
                                    If clicking the above link does not work, you can simply copy the link and paste it in your browser’s address window.
                                </multiline>
                            </div>
                        </td>
                    </tr> 
                    <tr>
                        <td class="w580" width="580" height="10"></td>
                    </tr>-->
                    <tr>
                        <td class="w580" width="580">       
                            <div align="left" class="article-content">
                                <multiline label="Description">
									<b>NOTE:</b> The above link will lead you to a page where you can set your new password.
                                </multiline>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w580" width="580" height="10"></td>
                    </tr>
                    <tr>
                        <td class="w580" width="580"> 
                            <div align="left" class="article-content">
                                <multiline label="Description">
                                    If you still have any issues, please contact <a >{{ SiteSettings::first()->notification_email }}</a>.
                                </multiline>
                                <br/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w580" width="580" height="10"></td>
                    </tr>
                    </tbody>
                </table>
        </tr>

</tbody>
</table>                                        
</tr>
<tr>
<td class="w640" width="640" height="30"></td>
</tr>
</tbody>
</table></td>
</tr>
</tbody>
</table>

    
@endsection