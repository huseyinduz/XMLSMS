<?php 

	function HTTPPoster($prmPostAddress,$prmSendData){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$prmPostAddress); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $prmSendData); 
		$result = curl_exec($ch);
		return $result;
	}

	function KullaniciKontrol(){
		$strXML = "<MainReportRoot><UserName>test-mb1000</UserName><PassWord>89tr34</PassWord><Action>4</Action></MainReportRoot>";
		$strDonus = HTTPPoster("http://gateway.mobilus.net/com.mobilus",$strXML);
		$arrDonus = explode(Chr(10),$strDonus);
		$strDonus = implode("<br>",$arrDonus);
		echo $strDonus;
	}

	function MesajGonder1(){
		$strXML = "<MainmsgBody><UserName>test-mb1000</UserName><PassWord>4567</PassWord><Action>0</Action><Mesgbody>DENEME MESAJI</Mesgbody><Numbers>05334924505</Numbers><Originator></Originator><SDate></SDate></MainmsgBody>";
		$strDonus = HTTPPoster("http://gateway.mobilus.net/com.mobilus",$strXML);
		echo $strDonus;
	}

	function MesajGonder2(){
		$strXML = "<MainmsgBody><UserName>test-mb1000</UserName><PassWord>4567</PassWord><Action>1</Action><Messages><Message><Mesgbody>DENEME MESAJI 1</Mesgbody><Number>05334924505</Number></Message><Message><Mesgbody>DENEME MESAJI 2</Mesgbody><Number>05334924505</Number></Message></Messages><Originator></Originator><SDate></SDate></MainmsgBody>";
		$strDonus = HTTPPoster("http://gateway.mobilus.net/com.mobilus",$strXML);
		echo $strDonus;
	}

	function Raporla1(){
		$strXML = "<MainReportRoot><UserName>test-mb1000</UserName><PassWord>89tr34</PassWord><Action>3</Action><MsgID>2947582</MsgID></MainReportRoot>";
		$strDonus = HTTPPoster("http://gateway.mobilus.net/com.mobilus",$strXML);
		$arrDonus = explode(Chr(10),$strDonus);
		$strDonus = implode("<br>",$arrDonus);
		echo $strDonus;
	}

	function Raporla2(){
		$strXML = "<MainReportRoot><UserName>test-mb1000</UserName><PassWord>89tr34</PassWord><Action>2</Action><FDate>2005-09-01</FDate><LDate>2005-09-25</LDate></MainReportRoot>";
		$strDonus = HTTPPoster("http://gateway.mobilus.net/com.mobilus",$strXML);
		$arrDonus = explode(Chr(10),$strDonus);
		$strDonus = implode("<br>",$arrDonus);
		echo $strDonus;
	}
?>

<html>

<head>
<meta http-equiv="Content-Language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
<title>XML API PHP �rnek</title>
</head>

<body>
<table border="0" cellspacing="0" width="500" height="100%" id="AutoNumber1" style="border-collapse: collapse" bordercolor="#111111" cellpadding="0">
  <tr>
    <td width="50%" valign="top">
    	<table border="1" cellspacing="1" width="100%" id="AutoNumber2" height="100%" cellpadding="5" bordercolor="#000000">
          <tr>
            <td width="100%" valign="top">
            	<font face="Tahoma" size="2">
            		<?php            			
						switch (@$_POST["submit"]){
							Case "Kullan�c� bilgileri kontrol�" :
			    				KullaniciKontrol();
								break;
            				Case "Mesaj g�nderimi (SMSToMany)" :
            					MesajGonder1();
								break;
            				Case "Mesaj g�nderimi (SMS MultiSenders)" :
            					MesajGonder2();
								break;
		        			Case "TimerID baz�nda raporlama" :
			    				Raporla1();
								break;
            				Case "Tarih baz�nda raporlama" :
            					Raporla2();
								break;
						}            			
					?>
            	</font>
            &nbsp;</td>
          </tr>
        </table>
    </td>
    <td width="50%" valign="top">
    	<table border="0" cellspacing="1" width="100%" height="100" id="AutoNumber3">
    		<form name="frm1" method="POST" action="XMLOrnek.php">
	          <tr>
	            <td width="100%">
			    	<font face="Tahoma" size="2">	            
						<input type="submit" name="submit" value="Kullan�c� bilgileri kontrol�" style="font-family: Tahoma; font-size: 10pt; border: 1px solid #000000">
			     	</font>	            
	            </td>
    	      </tr>
        	  <tr>
	            <td width="100%">
			    	<font face="Tahoma" size="2">	            
						<input type="submit" name="submit" value="Mesaj g�nderimi (SMSToMany)" style="font-family: Tahoma; font-size: 10pt; border: 1px solid #000000">
			     	</font>	            
	            </td>
	          </tr>
    	      <tr>
	            <td width="100%">
			    	<font face="Tahoma" size="2">	            
						<input type="submit" name="submit" value="Mesaj g�nderimi (SMS MultiSenders)" style="font-family: Tahoma; font-size: 10pt; border: 1px solid #000000">
			     	</font>	            
	            </td>
	          </tr>
    	      <tr>
	            <td width="100%">
			    	<font face="Tahoma" size="2">	            
						<input type="submit" name="submit" value="TimerID baz�nda raporlama" style="font-family: Tahoma; font-size: 10pt; border: 1px solid #000000">
			     	</font>	            
	            </td>
	          </tr>
    	      <tr>
	            <td width="100%">
			    	<font face="Tahoma" size="2">	            
						<input type="submit" name="submit" value="Tarih baz�nda raporlama" style="font-family: Tahoma; font-size: 10pt; border: 1px solid #000000">
			     	</font>	            
	            </td>
	          </tr>
			</form>
        </table>				
    </td>
  </tr>
</table>
</body>

</html>
