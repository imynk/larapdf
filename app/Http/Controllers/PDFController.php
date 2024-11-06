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
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' =>  5,
            'default_font_size' => 8,  // Set a default font size for the document
            'default_font' => 'Arial'  // Set a default font if needed
        ]);

        // Set custom top margin for content
        $mpdf->SetTopMargin(50);

        // Set header HTML
        $mpdf->SetHTMLHeader('
                <table width="100%" style="vertical-align: middle; font-size: 10pt; color: #333;">
                    <tr>
                        <td width="50%">
                            <div style="font-size: 40px; font-weight: bold; line-height: 40px;">Frame-Express</div>
                            <div style="font-size: 20px; font-weight: bold; line-height: 20px;">Picture Framers Ltd</div>
                        </td>
                        <td width="50%" style="text-align: right;">
                            <div>Website: <a href="http://www.pictureframesexpress.co.uk" style="color: #333; text-decoration: none;">www.pictureframesexpress.co.uk</a></div>
                            <div>E-Mail: <a href="mailto:sales@frame-express.net" style="color: #333; text-decoration: none;">sales@frame-express.net</a></div>
                            <div>Tel: 02476 225504</div>
                        </td>
                    </tr>
                </table>
                <div style="display: flex; align-items: center; margin-top: 10px;">
                    <div style="height: 3px; flex: 1; background-color: #000;"></div>
                    <div style="font-size: 16px; font-weight: bold; margin: 0 10px;">Quote</div>
                    <div style="height: 3px; flex: 1; background-color: #000;"></div>
                </div>
        ');

        // Set footer HTML
        $mpdf->SetHTMLFooter('
            <table width="100%" style="vertical-align: bottom; font-size: 9pt; color: #333;">
                <tr>
                    <td align="center">
                        For terms & conditions visit www.pictureframesexpress.co.uk/terms<br>
                        Frame-Express Picture Framers Ltd, 304 Kingfield Road, Coventry, CV1 4EP<br>
                        Company 4480495 - VAT 695591380
                    </td>
                </tr>
            </table>
        ');

       
        $mpdf->WriteHTML('
            <table width="100%" style="vertical-align: middle; font-size: 10pt; color: #333;">
            <tr>
                <td width="50%">
                    <table width="80%" style="border-collapse: collapse; border: 1px solid #000; border-radius: 10px;">
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
                                <div><a href="mailto:hello@frameagame.com" style="color: #333; text-decoration: none;">hello@frameagame.com</a></div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table width="60%" style="border-collapse: collapse; border: 1px solid #000; margin: 0 0 0 auto;">
                        
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Date</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">21/10/2024</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Quote Ref.</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">Q056074</td>
                        </tr>

                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Account Number</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">000000</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Purchase Order</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;"></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Vendor/Supplier</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;"></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Paid Date</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">21/10/2024</td>
                        </tr>
                    </table>
                </td>
            </table>
            
            <table width="100%" style="border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #000; padding: 5px;">Qty</th>
                        <th style="border: 1px solid #000; padding: 5px;">Description</th>
                        <th style="border: 1px solid #000; padding: 5px;">Sub Total</th>
                        <th style="border: 1px solid #000; padding: 5px;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">1</td>
                        <td style="border: 1px solid #000; padding: 5px;">
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
                        <td style="border: 1px solid #000; padding: 5px;">34.23</td>
                        <td style="border: 1px solid #000; padding: 5px;">£34.23</td>
                    </tr>
                     <tr>
                        <td style="border: 1px solid #000; padding: 5px;">1</td>
                        <td style="border: 1px solid #000; padding: 5px;">
                           Accessory - Sheet Material - Plexiglas - 3mm - UV100 - clear - XT gallery - (special order - amari)<br>
                            Size: 310mm x 470mm<br>
                            (FOR FRAME ABOVE)<br>
                        </td>
                        <td style="border: 1px solid #000; padding: 5px;">£11.52</td>
                        <td style="border: 1px solid #000; padding: 5px;">£11.52</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">2</td>
                        <td style="border: 1px solid #000; padding: 5px;">
                           Accessory - Mountboard - Black-372 - White core<br>
                            Size: 540mm x 430mm<br>
                        </td>
                        <td style="border: 1px solid #000; padding: 5px;">£4.18</td>
                        <td style="border: 1px solid #000; padding: 5px;">£8.36</td>
                    </tr>
                      <tr>
                        <td style="border: 1px solid #000; padding: 5px;">1</td>
                        <td style="border: 1px solid #000; padding: 5px;">
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
                        <td style="border: 1px solid #000; padding: 5px;">£56.85</td>
                        <td style="border: 1px solid #000; padding: 5px;">£56.85</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">1</td>
                        <td style="border: 1px solid #000; padding: 5px;">
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
                        <td style="border: 1px solid #000; padding: 5px;">£32.82</td>
                        <td style="border: 1px solid #000; padding: 5px;">£32.82</td>
                    </tr>
                    
                  
                    
                   
                </tbody>
                </tr>
            </table>
        ');

        // Add a new page 
        $mpdf->AddPage();

        $mpdf->WriteHTML('
                <table width="100%" style="vertical-align: middle; font-size: 10pt; color: #333;">
                <tr>
                    <td width="50%">
                        <table width="80%" style="border-collapse: collapse; border: 1px solid #000; border-radius: 10px;">
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
                                    <div><a href="mailto:hello@frameagame.com" style="color: #333; text-decoration: none;">hello@frameagame.com</a></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="60%" style="border-collapse: collapse; border: 1px solid #000; margin: 0 0 0 auto;">
                            
                            <tr>
                                <td style="border: 1px solid #000; padding: 5px;">Date</td>
                                <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">21/10/2024</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #000; padding: 5px;">Quote Ref.</td>
                                <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">Q056074</td>
                            </tr>

                            <tr>
                                <td style="border: 1px solid #000; padding: 5px;">Account Number</td>
                                <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">000000</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #000; padding: 5px;">Purchase Order</td>
                                <td style="border: 1px solid #000; padding: 5px; font-weight: bold;"></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #000; padding: 5px;">Vendor/Supplier</td>
                                <td style="border: 1px solid #000; padding: 5px; font-weight: bold;"></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #000; padding: 5px;">Paid Date</td>
                                <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">21/10/2024</td>
                            </tr>
                        </table>
                    </td>
                </table>
                
                <table width="100%" style="border-collapse: collapse; margin-top: 10px;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #000; padding: 5px;">Qty</th>
                            <th style="border: 1px solid #000; padding: 5px;">Description</th>
                            <th style="border: 1px solid #000; padding: 5px;">Sub Total</th>
                            <th style="border: 1px solid #000; padding: 5px;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">2</td>
                            <td style="border: 1px solid #000; padding: 5px;">
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
                            <td style="border: 1px solid #000; padding: 5px;">£72.48</td>
                            <td style="border: 1px solid #000; padding: 5px;">£144.96</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">1</td>
                            <td style="border: 1px solid #000; padding: 5px;">
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
                            <td style="border: 1px solid #000; padding: 5px;">£28.03</td>
                            <td style="border: 1px solid #000; padding: 5px;">£28.03</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">3</td>
                            <td style="border: 1px solid #000; padding: 5px;">
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
                            <td style="border: 1px solid #000; padding: 5px;">£38.63</td>
                            <td style="border: 1px solid #000; padding: 5px;">£115.89</td>
                        </tr> 
                    </tbody>
                    </tr>
                </table>
        ');
    $mpdf->AddPage();

    $mpdf->WriteHTML('
            <table width="100%" style="vertical-align: middle; font-size: 10pt; color: #333;">
            <tr>
                <td width="50%">
                    <table width="80%" style="border-collapse: collapse; border: 1px solid #000; border-radius: 10px;">
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
                                <div><a href="mailto:hello@frameagame.com" style="color: #333; text-decoration: none;">hello@frameagame.com</a></div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table width="60%" style="border-collapse: collapse; border: 1px solid #000; margin: 0 0 0 auto;">
                        
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Date</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">21/10/2024</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Quote Ref.</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">Q056074</td>
                        </tr>

                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Account Number</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">000000</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Purchase Order</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;"></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Vendor/Supplier</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;"></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px;">Paid Date</td>
                            <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">21/10/2024</td>
                        </tr>
                    </table>
                </td>
            </table>
            
            <table width="100%" style="border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #000; padding: 5px;">Qty</th>
                        <th style="border: 1px solid #000; padding: 5px;">Description</th>
                        <th style="border: 1px solid #000; padding: 5px;">Sub Total</th>
                        <th style="border: 1px solid #000; padding: 5px;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">10</td>
                        <td style="border: 1px solid #000; padding: 5px;">
                            SET PRICE FOR 240MM X 430MM&apos;S - uv<br>
                            Picture frame - R933 - 18mm painted grain black - (8-345) - Internal Size : 240mm x 430mm<br>
                            Glazing: UV protective Clear Plexiglas - Backing: MDF : Hang/Stand: Hang<br>
                            Picture mount : External Size : 240mm x 430mm : Black-372 : White core<br>
                            Exact opening: 200mm x 390mm - Opening shape : Rectangle<br>
                            Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                            Backing Card: 240mm x 430mm - Black-372 : White core<br>
                            Tasks : Fillet - black - 25mm - Size: 240mm x 430mm<br>
                            (borders set so 15mm will be visible in the front window)---pozi on 240mm---<br>
                        </td>
                        <td style="border: 1px solid #000; padding: 5px;">£22.90</td>
                        <td style="border: 1px solid #000; padding: 5px;">£229.00</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">6</td>
                        <td style="border: 1px solid #000; padding: 5px;">
                            SET PRICE FOR 270MM x 270MM WITH UV PLEXI AND STAND BACKS+HANG (NO FRONT MOUNT)<br>
                            Picture frame - R933 - 18mm painted grain black - (8-345) Internal Size : 270mm x 270mm<br>
                            Glazing: UV protective Clear Plexiglas - Backing: MDF : Hang/Stand: Hang + Stand Back<br>
                            NO MOUNT<br>
                            Backing Card: 270mm x 270mm - Black-372 : White core<br>
                            Tasks Fillet - black - 25mm - Size: 270mm x 270mm---pozi both ways---<br>
                        </td>
                        <td style="border: 1px solid #000; padding: 5px;">£16.70</td>
                        <td style="border: 1px solid #000; padding: 5px;">£100.20</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;">2</td>
                        <td style="border: 1px solid #000; padding: 5px;">
                            SET PRICE FOR 240MM X 430MM&apos;S - uv and white front mount<br>
                            Picture frame - R933 - 18mm painted grain black - (8-345) - Internal Size : 240mm x 430mm<br>
                            Glazing: UV protective Clear Plexiglas - Backing: MDF : Hang/Stand: Hang<br>
                            Picture mount : External Size : 240mm x 430mm : AQ1 Soft White : White core<br>
                            Exact opening: 200mm x 390mm - Opening shape : Rectangle<br>
                            Border Width : Left 20mm - Right 20mm - Top 20mm - Bottom 20mm<br>
                            Backing Card: 240mm x 430mm - Black-372 : White core<br>
                            Tasks : Fillet - black - 25mm - Size: 240mm x 430mm<br>
                            (borders set so 15mm will be visible in the front window)---pozi on240mm---<br>
                        </td>
                        <td style="border: 1px solid #000; padding: 5px;">£22.90</td>
                        <td style="border: 1px solid #000; padding: 5px;">£45.80</td>
                    </tr> 
                      <tr>
                        <td style="border: 1px solid #000; padding: 5px;">1</td>
                        <td style="border: 1px solid #000; padding: 5px;">
                            SET PRICE FOR TRUVUE PLEXIGLAS SIZE 203MM X 406MM<br>
                        </td>
                        <td style="border: 1px solid #000; padding: 5px;">£31.00</td>
                        <td style="border: 1px solid #000; padding: 5px;">£31.00</td>
                    </tr> 
                      <tr>
                        <td style="border: 1px solid #000; padding: 5px;">1</td>
                        <td style="border: 1px solid #000; padding: 5px;">
                            Delivery: England and Wales - Postage and packaging<br>
                        </td>
                        <td style="border: 1px solid #000; padding: 5px;">£19.99</td>
                        <td style="border: 1px solid #000; padding: 5px;">£19.99</td>
                    </tr> 
                </tbody>
                </tr>
            </table>
            <table width="40%" style="vertical-align: middle; font-size: 10pt; color: #333; margin: 10pt 0 0 auto; border: 1px solid #000;">
                <tr>
                    <td style="padding: 5px 20px 5px 5px; text-align: right;">Sub Total</td>
                    <td style="padding: 5px;">=</td>
                    <td style="padding: 5px 5px 5px 20px; text-align: left;">£858.65</td>
                </tr>
                <tr>
                    <td style="padding: 5px 20px 5px 5px;  text-align: right;">Discount</td>
                    <td style="padding: 5px;">=</td>
                    <td style="padding: 5px 5px 5px 20px; text-align: left;">-£0.00</td>
                </tr>
                <tr>
                    <td style="padding: 5px 20px 5px 5px;  text-align: right;">Total</td>
                    <td style="padding: 5px;">=</td>
                    <td style="padding: 5px 5px 5px 20px; text-align: left;">£858.65</td>
                </tr>
                <tr>
                    <td style="padding: 5px 20px 5px 5px;  text-align: right;">VAT @ 20.00%</td>
                    <td style="padding: 5px;">=</td>
                    <td style="padding: 5px 5px 5px 20px; text-align: left;">£171.73</td>
                </tr>
                <tr>
                    <td style="padding: 5px 20px 5px 5px; text-align: right; font-weight: bold;">GRAND TOTAL</td>
                    <td style="padding: 5px; font-weight: bold;">=</td>
                    <td style="padding: 5px 5px 5px 20px; text-align: left; font-weight: bold;">£1030.38</td>
                </tr>
            </table>
    ');
        // Output the PDF to the browser
        $mpdf->Output('quote.pdf', 'I');  
    }
}
