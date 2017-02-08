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
                                                            Dear {{ $client->first_name . ' ' . $client->last_name }},
                                                            <br>
                                                        </multiline>
                                                    </div>
                                                    <div align="left" class="article-content">
                                                        <multiline label="Description">
                                                          A request to change your password has been made on TEBLAGHA Application. Please use the following password for your next login where you can change it later from your profile page.
                                                          <br /><br />
                                                          Temporary Password: {{ $password }}<br />
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
