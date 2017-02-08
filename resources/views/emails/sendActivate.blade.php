@extends('email')

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
                                                            Dear {{ $data['first_name'] }},
                                                        </multiline>
                                                    </div>
                                                    <div align="left" class="article-content">
                                                        <multiline label="Description">
                                                        This email is to notify you that your account has been activated on the TEBLAGHA Application.</a>
                                                        </multiline>
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