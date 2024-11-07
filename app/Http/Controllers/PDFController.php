<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PDFController extends Controller
{
    public function pdf()
    {
        // Initialize mPDF
        $mpdf = new Mpdf([
            'margin_header' => 5,
	        'margin_footer' => 3,
            'margin_left' => 6,
            'margin_right' => 6,
            'margin_top' => 34,
            'margin_bottom' =>  5,
            'default_font_size' => 8,
            'default_font' => 'Arial',
        ]);
        // Set header HTML
        $mpdf->SetHTMLHeader('
            <div class="header">
                        <div class="fl-lt wd-50">
                            <div style="font-size: 46px; font-weight: bold; line-height: 46px; margin-bottom:2px;">Frame-Express</div>
                            <div style="font-size: 20px; font-weight: bold; line-height: 20px;">Picture Framers Ltd</div>
                        </div>    
                        <div class="fl-rt wd-50 ">
                            <div>Website: <a href="http://www.pictureframesexpress.co.uk" style="color: #000; text-decoration: none;">www.pictureframesexpress.co.uk</a></div>
                            <div>E-Mail: <a href="mailto:sales@frame-express.net" style="color: #000; text-decoration: none;">sales@frame-express.net</a></div>
                            <div>Tel: 02476 225504</div>
                        </div>
            </div>
            <table width="100%" style="margin: 5px 0px;">
                 <thead>
                    <tr>
                        <th width="10%"><hr style="color: #000; height: 1.5px;"></th>
                        <th width="10%" class="q-txt">Quote</th>
                        <th width="80%"><hr style="color: #000; height: 1.5px;"></th>
                    </tr>
                    </thead>
            </table>
          
        ');

        // Set footer HTML
        $mpdf->SetHTMLFooter('
            <div class="footer">
                        For terms & conditions visit www.pictureframesexpress.co.uk/terms<br>
                        Frame-Express Picture Framers Ltd, 304 Kingfield Road, Coventry, CV1 4EP<br>
                        Company 4480495 - VAT 695591380
            </div>
        ');
        $mpdf->WriteHTML('
            <style>
                .q-txt{
                    font-size: 18px;
                    font-weight: bold;
                    font-style: italic;
                }
                .header {
                    font-size: 13px; 
                    line-height: 16px;
                    color: #000;
                    vertical-align: center;
                }
                .header .fl-rt div{
                    text-align: right;
                    margin-bottom: 0;
                }
                .wd-50{
                    width: 50%;
                }
                .footer{
                    font-size: 10px;
                    line-height: 15px;
                    color: #000;
                    text-align: center;
                }
                .table-bxd1{
                    font-size: 11px;
                    line-height: 14px;
                    color: #000;
                }
                .table-bxd2{
                    border-collapse: collapse;
                    font-size: 12px;
                    line-height: 14px;
                    color: #000;
                }
                .table-bxd3{
                    border-collapse: collapse;
                    margin-top: 11px; 
                    vertical-align: top;
                    font-size: 10px;
                    line-height: 18px;
                    color: #000;
                } 
                .table-bxd3 th, .table-bxd3 td{
                    border: 1px solid #000; 
                    padding: 3px;
                }
                .table-bxd3 th{
                    font-size: 13px;
                }
                .table-bxd3 tr td:nth-child(1), .table-bxd3 tr td:nth-child(3), .table-bxd3 tr td:nth-child(4){
                   text-align: center;
                }
                   
                .table-bxd3 tr td:nth-child(1){
                    width: 5%;
                }
                .table-bxd3 tr td:nth-child(3), .table-bxd3 tr td:nth-child(4){    
                    width:10%;
                }
                .base-table {
                    border-collapse: collapse;
                    border: 1px solid #000;
                    border-radius: 10px;
                }
                .table-sm-box {
                    border: 1px solid #000;
                    border-radius: 10px;
                    margin-bottom: 10px;
                }
                .fl-lt{
                    float: left ;
                }
                .fl-rt{
                    float: right;
                }
                   
                .table-bxd2 td{
                    padding: 7px 20px;
                }
                .table-bxd2 .bold{
                    font-weight: bold;
                    border: 1px solid #000;;
                    border-bottom-width: 0;
                    border-top-width: 0;
                    border-left-width: 1;
                    border-right-width: 0;
                }
                .table-bxd2 tr {
                    border: 1px solid #000;;
                    border-bottom-width: 0;
                    border-top-width: 1;
                    border-left-width: 0;
                    border-right-width: 0;
                }
                .table-bxd2 tr:nth-child(1){
                    border-top-width: 0;
                }
                .table-bxd4-box{
                    border: 1px solid #000;
                    border-radius: 10px;
                    margin-top: 10px;
                    width: 40%;
                    float: right;
                    padding-bottom: 10px;
                    padding-right: 10px;
                }
                .table-bxd4{
                    vertical-align: middle;
                    font-size: 10pt;
                    color: #333;
                    border: 0px solid #000;
                    font-size: 11px;
                    line-height: 14px;
                    color: #000;
                }
                .table-bxd4 tr td:nth-child(1){
                    padding: 5px 20px 5px 5px;
                    text-align: right;
                }
                .table-bxd4 tr td:nth-child(2){
                    padding: 2;
                    text-align: center;
                }
                .table-bxd4 tr td:nth-child(3){
                    font-size: 13px;
                    line-height: 14px;
                    padding: 5px 5px 5px 20px;
                    text-align: left; 
                }
                
               

               
            </style>
                <div class="main-sm-box">
            
                    <div class="table-sm-box fl-lt" style="width: 230px;">
                        <table class="table-bxd1">
                            <tr>
                                <td style="padding: 10px;">
                                    <div style="font-weight: bold; text-decoration: underline;">Quote to:</div>
                                    <br>
                                    <div>Kirk Layton</div>
                                    <br>
                                    <br>
                                    <div>Frame-A-Game Limited</div>
                                    <div>11 Drakes Court</div>
                                    <div>Quayside Walk</div>
                                    <div>Southampton</div>
                                    <div>Hampshire</div>
                                    <div>SO40 4AA</div>
                                    <div>07391 598736</div>
                                    <div><a href="mailto:hello@frameagame.com" style="text-decoration: none; color: #000;">hello@frameagame.com</a></div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-sm-box fl-rt" style="width: 280px;">
                        <table width="100%" class="table-bxd2">
                            <tr>
                                <td >Date</td>
                                <td class="bold">21/10/2024</td>
                            </tr>
                            <tr>
                                <td>Quote Ref.</td>
                                <td class="bold">Q056074</td>
                            </tr>
                            <tr>
                                <td>Account Number</td>
                                <td class="bold">000000</td>
                            </tr>
                            <tr>
                                <td>Purchase Order</td>
                                <td class="bold"></td>
                            </tr>
                            <tr>
                                <td>Vendor/Supplier</td>
                                <td class="bold"></td>
                            </tr>
                            <tr>
                                <td>Paid Date</td>
                                <td class="bold">21/10/2024</td>
                            </tr>
                        </table>
                    </div>
                </div>
          
            <table width="100%" class="table-bxd3">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Description</th>
                        <th>Sub Total</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            Picture frame - R933 - 18mm painted grain black - (8-345) - Internal Size : 310mm x 470mm<br>
                            Glazing: None - Backing: MDF : Hang/Stand: Hang<br>
                            Picture mount : External Size : 310mm x 470mm : Black-372 : White core<br>
                            Exact opening: 270mm x 430mm - Opening shape : Rectangle<br>
                            Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                            Backing Card: 310mm x 470mm - Black-372 : White core<br>
                            Tasks : Fillet - black - 25mm - Size: 310mm x 470mm<br>
                            (borders set so 15mm will be visible in the front window)<br>
                            ---pozi on 310mm---(GLAZING LISTED SEPARATLY)
                        </td>
                        <td >34.23</td>
                        <td  >£34.23</td>
                    </tr>
                     <tr>
                        <td >1</td>
                        <td >
                           Accessory - Sheet Material - Plexiglas - 3mm - UV100 - clear - XT gallery - (special order - amari)<br>
                            Size: 310mm x 470mm<br>
                            (FOR FRAME ABOVE)<br>
                        </td>
                        <td >£11.52</td>
                        <td >£11.52</td>
                    </tr>
                    <tr>
                        <td >2</td>
                        <td >
                           Accessory - Mountboard - Black-372 - White core<br>
                            Size: 540mm x 430mm<br>
                        </td>
                        <td >£4.18</td>
                        <td >£8.36</td>
                    </tr>
                      <tr>
                        <td >1</td>
                        <td >
                           SET PRICE FOR 240MM X 430MM&apos;S - truvue<br>
                            Picture frame - R933 - 18mm painted grain black - (8-345) - Internal Size : 240mm x 430mm<br>
                            Glazing: 3mm TruVue Plexiglas - Backing: MDF : Hang/Stand: Hang<br>
                            Picture mount : External Size : 240mm x 430mm : Black-372 : White core<br>
                            Exact opening: 200mm x 390mm - Opening shape : Rectangle<br>
                            Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                            Backing Card: 240mm x 430mm - Black-372 : White core<br>
                            Tasks : Fillet - black - 25mm - Size: 240mm x 430mm<br>
                            (borders set so 15mm will be visible in the front window)---pozi on 240mm---<br>
                        </td>
                        <td >£56.85</td>
                        <td >£56.85</td>
                    </tr>
                    <tr>
                        <td >1</td>
                        <td >
                            SET PRICE FOR 195MM X 290MM&apos;S - truvue<br>
                            Picture frame - R933 - 18mm painted grain black - (8-345) - Internal Size : 195mm x 290mm<br>
                            Glazing: 3mm TruVue Plexiglas - Backing: MDF : Hang/Stand: Hang<br>
                            Picture mount : External Size : 195mm x 290mm : Black-372 : White core<br>
                            Exact opening: 155mm x 250mm - Opening shape : Rectangle<br>
                            Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                            Backing Card: 195mm x 290mm - Black-372 : White core<br>
                            Tasks : Fillet - black - 25mm - Size: 195mm x 290mm<br>
                            (borders set so 15mm will be visible in the front window)---pozi on 195mm---<br>


                        </td>
                        <td >£32.82</td>
                        <td >£32.82</td>
                    </tr>
                    
                  
                    
                   
                </tbody>
                
            </table>
        ');

        // Add a new page 
        $mpdf->AddPage();

        $mpdf->WriteHTML('
                 <div class="main-sm-box">
            
                    <div class="table-sm-box fl-lt" style="width: 230px;">
                        <table class="table-bxd1">
                            <tr>
                                <td style="padding: 10px;">
                                    <div style="font-weight: bold; text-decoration: underline;">Quote to:</div>
                                    <br>
                                    <div>Kirk Layton</div>
                                    <br>
                                    <br>
                                    <div>Frame-A-Game Limited</div>
                                    <div>11 Drakes Court</div>
                                    <div>Quayside Walk</div>
                                    <div>Southampton</div>
                                    <div>Hampshire</div>
                                    <div>SO40 4AA</div>
                                    <div>07391 598736</div>
                                    <div><a href="mailto:hello@frameagame.com" style="text-decoration: none; color: #000;">hello@frameagame.com</a></div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-sm-box fl-rt" style="width: 280px;">
                        <table width="100%" class="table-bxd2">
                            <tr>
                                <td >Date</td>
                                <td class="bold">21/10/2024</td>
                            </tr>
                            <tr>
                                <td>Quote Ref.</td>
                                <td class="bold">Q056074</td>
                            </tr>
                            <tr>
                                <td>Account Number</td>
                                <td class="bold">000000</td>
                            </tr>
                            <tr>
                                <td>Purchase Order</td>
                                <td class="bold"></td>
                            </tr>
                            <tr>
                                <td>Vendor/Supplier</td>
                                <td class="bold"></td>
                            </tr>
                            <tr>
                                <td>Paid Date</td>
                                <td class="bold">21/10/2024</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <table width="100%" class="table-bxd3">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Description</th>
                            <th>Sub Total</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >2</td>
                            <td >
                                SET PRICE FOR 520MM X 260MM&apos;S - truvue<br>
                                Picture frame - R933 - 18mm painted grain black - (8-345) - Internal Size : 520mm x 260mm<br>
                                Glazing: 3mm TruVue Plexiglas - Backing: MDF : Hang/Stand: Hang<br>
                                Picture mount : External Size : 520mm x 260mm : Black-372 : White core<br>
                                Exact opening: 480mm x 220mm - Opening shape : Rectangle<br>
                                Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                                Backing Card: 520mm x 260mm - Black-372 : White core<br>
                                Tasks : Fillet - black - 25mm - Size: 520mm x 260mm<br>
                                (borders set so 15mm will be visible in the front window)---pozi on 520mm ---<br>
                            </td>
                            <td >£72.48</td>
                            <td >£144.96</td>
                        </tr>
                        <tr>
                            <td >1</td>
                            <td >
                                SET PRICE FOR 520MM X 260MM&apos;S - uv<br>
                                Picture frame - R933 - 18mm painted grain black - (8-345) - Internal Size : 520mm x 260mm<br>
                                Glazing: UV protective Clear Plexiglas - Backing: MDF : Hang/Stand: Hang<br>
                                Picture mount : External Size : 520mm x 260mm : Black-372 : White core<br>
                                Exact opening: 480mm x 220mm - Opening shape : Rectangle<br>
                                Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                                Backing Card: 520mm x 260mm - Black-372 : White core<br>
                                Tasks : Fillet - black - 25mm - Size: 520mm x 260mm<br>
                                (borders set so 15mm will be visible in the front window)---pozi on 520mm---<br>
                            </td>
                            <td >£28.03</td>
                            <td >£28.03</td>
                        </tr>
                        <tr>
                            <td >3</td>
                            <td >
                                SET PRICE FOR 540MM X 430MM&apos;S - uv<br>
                                Picture frame - R933 - 18mm painted grain black - (8-345) Internal Size : 540mm x 430mm<br>
                                Glazing: UV protective Clear Plexiglas - Backing: MDF : Hang/Stand: Hang<br>
                                Picture mount External Size : 540mm x 430mm Black-372 : White core<br>
                                Exact opening: 500mm x 390mm Opening shape : Rectangle<br>
                                Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                                Backing Card: 540mm x 430mm - Black-372 : White core<br>
                                Tasks Fillet - black - 25mm - Size: 540mm x 430mm<br>
                                (borders set so 15mm will be visible in the front window)---pozi on 540mm---<br>
                            </td>
                            <td >£38.63</td>
                            <td >£115.89</td>
                        </tr>
                    </tbody>
                </table>

        ');
        $mpdf->AddPage();

        $mpdf->WriteHTML('
               <div class="main-sm-box">
            
                    <div class="table-sm-box fl-lt" style="width: 230px;">
                        <table class="table-bxd1">
                            <tr>
                                <td style="padding: 10px;">
                                    <div style="font-weight: bold; text-decoration: underline;">Quote to:</div>
                                    <br>
                                    <div>Kirk Layton</div>
                                    <br>
                                    <br>
                                    <div>Frame-A-Game Limited</div>
                                    <div>11 Drakes Court</div>
                                    <div>Quayside Walk</div>
                                    <div>Southampton</div>
                                    <div>Hampshire</div>
                                    <div>SO40 4AA</div>
                                    <div>07391 598736</div>
                                    <div><a href="mailto:hello@frameagame.com" style="text-decoration: none; color: #000;">hello@frameagame.com</a></div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-sm-box fl-rt" style="width: 280px;">
                        <table width="100%" class="table-bxd2">
                            <tr>
                                <td >Date</td>
                                <td class="bold">21/10/2024</td>
                            </tr>
                            <tr>
                                <td>Quote Ref.</td>
                                <td class="bold">Q056074</td>
                            </tr>
                            <tr>
                                <td>Account Number</td>
                                <td class="bold">000000</td>
                            </tr>
                            <tr>
                                <td>Purchase Order</td>
                                <td class="bold"></td>
                            </tr>
                            <tr>
                                <td>Vendor/Supplier</td>
                                <td class="bold"></td>
                            </tr>
                            <tr>
                                <td>Paid Date</td>
                                <td class="bold">21/10/2024</td>
                            </tr>
                        </table>
                    </div>
                </div>
            
                <table width="100%" class="table-bxd3">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Description</th>
                            <th>Sub Total</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >10</td>
                            <td >
                                SET PRICE FOR 240MM X 430MM&apos;S - uv<br>
                                Picture frame - R933 - 18mm painted grain black - (8-345) - Internal Size : 240mm x 430mm<br>
                                Glazing: UV protective Clear Plexiglas - Backing: MDF : Hang/Stand: Hang<br>
                                Picture mount : External Size : 240mm x 430mm : Black-372 : White core<br>
                                Exact opening: 200mm x 390mm - Opening shape : Rectangle<br>
                                Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                                Backing Card: 240mm x 430mm - Black-372 : White core<br>
                                Tasks : Fillet - black - 25mm - Size: 240mm x 430mm<br>
                                (borders set so 15mm will be visible in the front window)---pozi on 240mm---
                            </td>
                            <td >£22.90</td>
                            <td >£229.00</td>
                        </tr>
                        <tr>
                            <td >6</td>
                            <td >
                                SET PRICE FOR 270MM x 270MM WITH UV PLEXI AND STAND BACKS+HANG (NO FRONT MOUNT)<br>
                                Picture frame - R933 - 18mm painted grain black - (8-345) Internal Size : 270mm x 270mm<br>
                                Glazing: UV protective Clear Plexiglas - Backing: MDF : Hang/Stand: Hang + Stand Back<br>
                                NO MOUNT<br>
                                Backing Card: 270mm x 270mm - Black-372 : White core<br>
                                Tasks Fillet - black - 25mm - Size: 270mm x 270mm---pozi both ways---
                            </td>
                            <td >£16.70</td>
                            <td >£100.20</td>
                        </tr>
                        <tr>
                            <td >2</td>
                            <td >
                                SET PRICE FOR 240MM X 430MM&apos;S - uv and white front mount<br>
                                Picture frame - R933 - 18mm painted grain black - (8-345) - Internal Size : 240mm x 430mm<br>
                                Glazing: UV protective Clear Plexiglas - Backing: MDF : Hang/Stand: Hang<br>
                                Picture mount : External Size : 240mm x 430mm : AQ1 Soft White : White core<br>
                                Exact opening: 200mm x 390mm - Opening shape : Rectangle<br>
                                Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                                Backing Card: 240mm x 430mm - Black-372 : White core<br>
                                Tasks : Fillet - black - 25mm - Size: 240mm x 430mm<br>
                                (borders set so 15mm will be visible in the front window)---pozi on240mm---
                            </td>
                            <td >£22.90</td>
                            <td >£45.80</td>
                        </tr>
                        <tr>
                            <td >1</td>
                            <td >
                                SET PRICE FOR TRUVUE PLEXIGLAS SIZE 203MM X 406MM
                            </td>
                            <td >£31.00</td>
                            <td >£31.00</td>
                        </tr>
                        <tr>
                            <td >1</td>
                            <td >
                                Delivery: England and Wales - Postage and packaging
                            </td>
                            <td >£19.99</td>
                            <td >£19.99</td>
                        </tr>
                    </tbody>
            </table>
            <div class="table-bxd4-box">
                <table class="table-bxd4" width="100%">
                    <tr>
                        <td style="padding: 5px 20px 5px 5px; text-align: right;">Sub Total</td>
                        <td >=</td>
                        <td >£858.65</td>
                    </tr>
                    <tr>
                        <td >Discount</td>
                        <td >=</td>
                        <td >-£0.00</td>
                    </tr>
                    <tr>
                        <td >Total</td>
                        <td >=</td>
                        <td >£858.65</td>
                    </tr>
                    <tr>
                        <td >VAT @ 20.00%</td>
                        <td >=</td>
                        <td >£171.73</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; font-size: 16px;">GRAND TOTAL</td>
                        <td style="font-weight: bold; font-size: 16px;">=</td>
                        <td style="font-weight: bold; font-size: 16px;">£1030.38</td>
                    </tr>
                </table>
            </div>
    ');
        // Output the PDF to the browser
        $mpdf->Output('quote.pdf', 'I');
    }
}
