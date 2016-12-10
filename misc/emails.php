<?php

			$image_path = "http://" .$_SERVER["HTTP_HOST"]."/images";
			$txt_site_name = $_SERVER["HTTP_HOST"];
			$host_url = "http://" .$_SERVER["HTTP_HOST"]."/en";

$contact_email = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#059BCA'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>360Seha.com</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear Administrator,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>A user contacted you from <strong>$txt_site_name</strong> (Contact us Form).
                            Please review the user's Questions/Comments.<br>
                            <br>
                            Below are details: <strong><br>
                              --------------------<br>
  <br>

  <strong>Name :</strong> $full_name<br>
  <strong>Email :</strong> $email<br>
  <strong>Phone :</strong> $contact_no<br>
  <strong>Message :</strong> $message<br>
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#059BCA;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";


$send_message = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#059BCA'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>360Seha.com</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear $userName,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>A user contacted you from <strong>$txt_site_name</strong> (Contact us Form).
                            Please review the user's Questions/Comments.<br>
                            <br>
                            Below are details: <strong><br>
                              --------------------<br>
  <br>

  <strong>Name :</strong> $fullName<br>
  <strong>Email :</strong> $email<br>
  <strong>Phone :</strong> $contactNo<br>
  <strong>Message :</strong> $message<br>
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#059BCA;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";


$appointment_email = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#059BCA'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>360Seha.com</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear $userName,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>A user contacted you from <strong>$txt_site_name</strong> (Contact us Form).
                            Please review the user's Questions/Comments.<br>
                            <br>
                            Below are details: <strong><br>
                              --------------------<br>
  <br>

  <strong>Name :</strong> $fullName<br>
  <strong>Email :</strong> $email<br>
  <strong>Phone :</strong> $contactNo<br>
  <strong>Department :</strong> $department<br>
  <strong>Appointment Date :</strong> $appDate<br>
  <strong>Message :</strong> $message<br>
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#059BCA;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";


$review_message = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#059BCA'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>360Seha.com</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear $userName,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>A user contacted you from <strong>$txt_site_name</strong> (Contact us Form).
                            Please review the user's Questions/Comments.<br>
                            <br>
                            Below are details: <strong><br>
                              --------------------<br>
  <br>

  <strong>Name :</strong> $fullName<br>
  <strong>Recommends :</strong> $recommend<br>
  <strong>Message :</strong> $message<br>
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#059BCA;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";

$reset_password_email = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#059BCA'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>360Seha.com</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear $userTitle,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Your request for password reset has been completed. Please use the new password below<br>
                            <br>
                            Below are details: <strong><br>
                              --------------------<br>
  <br>

  <strong>New Password :</strong> $newPassword<br>
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#059BCA;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";

$join_subscriber = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#059BCA'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>360Seha.com</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear Administrator,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong>$txt_site_name</strong>: A new subscriber has been registered with us.<br>
                            <br>
                            Below are details: <strong><br>
                              --------------------<br>
  <br>

  <strong>Name :</strong> $title<br>
  <strong>Email :</strong> $email<br>
  <strong>Phone :</strong> $contact_no<br/>
  <strong>Category :</strong> $category<br/>
	<strong>Departments : </strong> $departments<br/>
  <strong>Location :</strong> $country_title, $city_title<br>
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#059BCA;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";



$acknowledgement_email = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#059BCA'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>360Seha.com</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear $title,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong>$txt_site_name</strong>: A new subscriber has been registered with us.<br>
                            <br>
                            Below are details: <strong><br>
                              --------------------<br>
  <br>
  Hi! thanks for registering with 360Seha. Our customer relationship executive will contact you soon.
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#059BCA;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";

$slogin_info = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#059BCA'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>360Seha.com</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear $title,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong>$txt_site_name</strong>: You account has been featured with 360seha and below are you login information with us.<br>
                            <br>strong><br>
                              --------------------<br>
  <br>


  <strong>Username :</strong> $username<br>
  <strong>Password :</strong> $password<br>
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#059BCA;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";

?>
