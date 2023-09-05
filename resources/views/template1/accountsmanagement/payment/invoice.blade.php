<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>A simple, clean, and responsive HTML invoice template</title>

        <style>
            .container {
                display: flex;
            }
            .container div {
                flex: 1;
            }
            .vl {
                border-left: 1px dashed black;
                height: 500px;
            }
            .data_table table{
                border: 2px solid black;
                border-collapse: collapse;

            }
            .data_table th{
                border: 2px solid black;
                border-collapse: collapse;

            }
            .data_table td{
                border: 1px solid black;
                border-collapse: collapse;

            }
            td , th{
                padding: 2px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div>
                <p style="text-align: right; margin-right: 10px; font-size: 12px;">Institute Copy</P>
                <table style="margin-top:-25px;">
                    <tr>
                        <td class="title">
                            <img src="/logo.jpg" style="width: 100%; max-width: 80px" />
                        </td>
                        <td>
                            <p style="font-size: 14px;">FARIDPUR MUSLIM MISSION COLLEGE<br>
                                RAGHUNANDANPUR, KOMORPUR, FARIDPUR SADAR, FARIDPUR.<p>
                        </td>
                    </tr>
                </table>
                <div style=" margin: -20px 5px -10px 10px;">
                    <hr>
                </div>
                <p style="text-decoration: underline; font-size:16px; font-weight: 600; text-align: center; margin: 0px;">Money Receipt</p>
                <table style="margin:0 0 0 20px; font-size: 13px;">
                    <tr>
                        <td style="width:70px;">Student ID</td>
                        <td style="width:10px;">:</td>
                        <td style="">2008717</td>
                    </tr>
                    <tr>
                        <td style="width:70px;">Name</td>
                        <td style="width:10px;">:</td>
                        <td style="">A. Rahman Sheikh</td>
                    </tr>
                    <tr>
                        <td style="width:70px;">Section</td>
                        <td style="width:10px;">:</td>
                        <td style="">TWELVE-N/A-BUSINESS</td>
                    </tr>
                    <tr>
                        <td style="width:70px;">Roll</td>
                        <td style="width:10px;">:</td>
                        <td style="">233</td>
                    </tr>
                </table>
                <div class="data_table">
                    <table style="margin:0 10px 0 10px; font-size: 13px; text-align: center; width: 95%;">
                        <th style="width:20%">Fee Name</th>
                        <th style="width:40%">Details</th>
                        <th style="width:12%">Waiver</th>
                        <th style="width:12%">Fine</th>
                        <th style="width:12%">Payable</th>

                        @for ($i = 0; $i <= 10; $i++)
                        <tr>
                            <td style="">Sports Fees</td>
                            <td style="text-align: left;"> Sports Fees</td>
                            <td style="text-align: right;">0.0</td>
                            <td style="text-align: right;">0.0</td>
                            <td style="text-align: right;">100</td>
                        </tr>
                        @endfor
                        <tr>
                            <td colspan="2" style="text-align: left; text-decoration: underline;"><b>Note:</b></td>
                            <td colspan="2" style="text-align: left;">Total Payable</td>
                            <td style="text-align: right;">1000.0</td>

                        </tr>
                        <tr>
                            <td colspan="2" rowspan="2" style="text-align: left; text-decoration: underline;"><b>Paid In Word:</b></td>
                            <td colspan="2" style="text-align: left;">Paid Amount</td>
                            <td style="text-align: right;">1000.0</td>

                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: left;">Due Amount</td>
                            <td style="text-align: right;">0.0</td>

                        </tr>
                    </table>
                </div>
                <table style="width:95%;">
                    <tr>
                        <td colspan="3">
                            <table style="margin:0 0 0 20px; font-size: 13px; width: 100%;">
                                <tr>
                                    <td style="width:30%">Academic Year</td>
                                    <td style="width:10%;">:</td>
                                    <td style="width:55%">2018</td>
                                </tr>
                                <tr>
                                    <td style="width:30%">Invoice ID</td>
                                    <td style="width:10%;">:</td>
                                    <td style="width:55%"><b>1809271092500072</b></td>
                                </tr> <tr>
                                    <td style="width:30%">Payment Date</td>
                                    <td style="width:10%;">:</td>
                                    <td style="width:55%">13-10-2018</td>
                                </tr> 
                                <tr>
                                    <td style="width:30%">Collected By</td>
                                    <td style="width:10%;">:</td>
                                    <td style="width:55%">01716479866</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table style="margin:50px 0 0 20px; font-size: 13px; width: 100%;">
                                <tr>
                                    <td></td>
                                    <td>
                                        <hr style="border-top: 2px dashed black; margin-bottom:-7px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="width:55%; text-align: right;">Accountant Signature</td>
                                </tr>
                            </table>
                        </td>
                    </tr>


                </table>





            </div>

            <div class="vl"> 

                <p style="text-align: right; margin-right: 10px; font-size: 12px;">Student Copy</P>
                <table style="margin-top:-25px;">
                    <tr>
                        <td class="title">
                            <img src="/logo.jpg" style="width: 100%; max-width: 80px" />
                        </td>
                        <td>
                            <p style="font-size: 14px;">FARIDPUR MUSLIM MISSION COLLEGE<br>
                                RAGHUNANDANPUR, KOMORPUR, FARIDPUR SADAR, FARIDPUR.<p>
                        </td>
                    </tr>
                </table>
                <div style=" margin: -20px 10px -10px 5px;">
                    <hr>
                </div>
                <p style="text-decoration: underline; font-size:16px; font-weight: 600; text-align: center; margin: 0px;">Money Receipt</p>
                <table style="margin:0 0 0 20px; font-size: 13px;">
                    <tr>
                        <td style="width:70px;">Student ID</td>
                        <td style="width:10px;">:</td>
                        <td style="">2008717</td>
                    </tr>
                    <tr>
                        <td style="width:70px;">Name</td>
                        <td style="width:10px;">:</td>
                        <td style="">A. Rahman Sheikh</td>
                    </tr>
                    <tr>
                        <td style="width:70px;">Section</td>
                        <td style="width:10px;">:</td>
                        <td style="">TWELVE-N/A-BUSINESS</td>
                    </tr>
                    <tr>
                        <td style="width:70px;">Roll</td>
                        <td style="width:10px;">:</td>
                        <td style="">233</td>
                    </tr>
                </table>
                <div class="data_table">
                    <table style="margin:0 10px 0 10px; font-size: 13px; text-align: center; width: 95%;">
                        <th style="width:20%">Fee Name</th>
                        <th style="width:40%">Details</th>
                        <th style="width:12%">Waiver</th>
                        <th style="width:12%">Fine</th>
                        <th style="width:12%">Payable</th>

                        @for ($i = 0; $i <= 10; $i++)
                        <tr>
                            <td style="">Sports Fees</td>
                            <td style="text-align: left;"> Sports Fees</td>
                            <td style="text-align: right;">0.0</td>
                            <td style="text-align: right;">0.0</td>
                            <td style="text-align: right;">100</td>
                        </tr>
                        @endfor
                        <tr>
                            <td colspan="2" style="text-align: left; text-decoration: underline;"><b>Note:</b></td>
                            <td colspan="2" style="text-align: left;">Total Payable</td>
                            <td style="text-align: right;">1000.0</td>

                        </tr>
                        <tr>
                            <td colspan="2" rowspan="2" style="text-align: left; text-decoration: underline;"><b>Paid In Word:</b></td>
                            <td colspan="2" style="text-align: left;">Paid Amount</td>
                            <td style="text-align: right;">1000.0</td>

                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: left;">Due Amount</td>
                            <td style="text-align: right;">0.0</td>

                        </tr>
                    </table>
                </div>
                <table style="width:95%;">
                    <tr>
                        <td colspan="3">
                            <table style="margin:0 0 0 20px; font-size: 13px; width: 100%;">
                                <tr>
                                    <td style="width:30%">Academic Year</td>
                                    <td style="width:10%;">:</td>
                                    <td style="width:55%">2018</td>
                                </tr>
                                <tr>
                                    <td style="width:30%">Invoice ID</td>
                                    <td style="width:10%;">:</td>
                                    <td style="width:55%"><b>1809271092500072</b></td>
                                </tr> <tr>
                                    <td style="width:30%">Payment Date</td>
                                    <td style="width:10%;">:</td>
                                    <td style="width:55%">13-10-2018</td>
                                </tr> 
                                <tr>
                                    <td style="width:30%">Collected By</td>
                                    <td style="width:10%;">:</td>
                                    <td style="width:55%">01716479866</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table style="margin:50px 0 0 20px; font-size: 13px; width: 100%;">
                                <tr>
                                    <td></td>
                                    <td>
                                        <hr style="border-top: 2px dashed black; margin-bottom:-7px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="width:55%; text-align: right;">Accountant Signature</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                
            </div>

        </div>
    </body>
</html>
