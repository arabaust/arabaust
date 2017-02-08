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
                                                    <p align="left" class="article-title">
                                                        <multiline label="Title">
                                                            {{ $ad->user->username }} has sent you a set of files.
                                                        </multiline>
                                                    </p>
                                                    <div align="left" class="article-content">
                                                        <multiline label="Description">
                                                            Dear {{ $value->email->station->name }},
                                                            <br/>
                                                            {{ $ad->user->username }}, these files are related to the following advertising campaign:
                                                        </multiline>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="w580" width="580" height="10"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                            <tr>
                                                <td class="w275" width="275" valign="top">
                                                    <table class="w275" width="275" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td class="w275" width="275">
                                                                <div align="left" class="article-content">
                                                                    <singleline label="Description">
                                                                        Advertiser:
                                                                    </singleline>
                                                                </div>
                                                                <div align="left" class="article-content">
                                                                    <singleline label="Description">
                                                                        Campaign:
                                                                    </singleline>
                                                                </div>
                                                                <div align="left" class="article-content">
                                                                    <singleline label="Description">
                                                                        Product:
                                                                    </singleline>
                                                                </div></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w275" width="275" height="10"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table></td>
                                                <td class="w30" width="30"></td>
                                                <td class="w275" width="275" valign="top">
                                                    <table class="w275" width="275" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td class="w275" width="275">
                                                                <div align="left" class="article-content">
                                                                    <singleline label="Description">
                                                                        {{ $ad->advertiser->name }}
                                                                    </singleline>
                                                                </div>
                                                                <div align="left" class="article-content">
                                                                    <singleline label="Description">
                                                                        {{ $ad->campaign->name }}
                                                                    </singleline>
                                                                </div>
                                                                <div align="left" class="article-content">
                                                                    <singleline label="Description">
                                                                        {{ $ad->product->name }}
                                                                    </singleline>
                                                                </div></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w275" width="275" height="10"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                            <tr>
                                                <td class="w580" width="580">
                                                    <p align="left" class="article-title small">
                                                        <multiline label="Title">
                                                            Message:
                                                        </multiline>
                                                    </p>
                                                    <div align="left" class="article-content">
                                                        <multiline label="Description">
                                                            {{ $ad->message }}
                                                        </multiline>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="w580" width="580" height="10"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                            <tr>
                                                <div align="left" class="article-title small">
                                                    <singleline label="Title">
                                                        Files:
                                                    </singleline>
                                                </div>
                                            </tr>
                                            @foreach($ad->files as $key => $file)
                                                <tr>
                                                    <td class="w120" width="120" valign="top">
                                                        <table class="w120" width="120" cellpadding="0" cellspacing="0" border="0">
                                                            <tbody>
                                                            <tr>
                                                                <td class="w120" width="120" height="10"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w120" width="120">
                                                                    <div align="left" class="article-content">
                                                                        <singleline label="Description">
                                                                            {{ $file->title }}
                                                                        </singleline>
                                                                    </div></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w120" width="120" height="10"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td width="20"></td>
                                                    <td class="w120" width="120" valign="top">
                                                        <table class="w120" width="120" cellpadding="0" cellspacing="0" border="0">
                                                            <tbody>

                                                            <tr>
                                                                <td class="w120" width="120" height="10"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w120" width="120">
                                                                    <div align="left" class="article-content">
                                                                        <singleline label="Description">
                                                                            {{ $file->code }}
                                                                        </singleline>
                                                                    </div></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w120" width="120" height="10"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td width="20"></td>
                                                    <td class="w120" width="120" valign="top">
                                                        <table class="w120" width="120" cellpadding="0" cellspacing="0" border="0">
                                                            <tbody>

                                                            <tr>
                                                                <td class="w120" width="120" height="10"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w120" width="120">
                                                                    <div align="left" class="article-content">
                                                                        <singleline label="Description">
                                                                            {{ $file->filename }}
                                                                        </singleline>
                                                                    </div></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w120" width="120" height="10"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td width="20"></td>
                                                    <td class="w120" width="120" valign="top">
                                                        <table class="w120" width="120" cellpadding="0" cellspacing="0" border="0">
                                                            <tbody>

                                                            <tr>
                                                                <td class="w120" width="120" height="10"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w120" width="120">
                                                                    <div align="left" class="article-content">
                                                                        <singleline label="Description">
                                                                            <a href="{{ url('download/files/' . $value->key) }}"><img id="customBtnImage{{ $key }}" label="Button Image{{ $key }}" editable="true" width="120" src="{{ $message->embed('http://ad-mailer.com/img/button.png') }}" class="w640" border="0" align="top" style="display: inline" /></a>
                                                                        </singleline>
                                                                    </div></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w120" width="120" height="10"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table></td>
                                    <td class="w30" width="30"></td>
                                </tr>
                                </tbody>
                            </table></td>
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