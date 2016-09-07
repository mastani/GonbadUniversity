<?php
/*
#
#  @author  Seyyed AMir -=> http://dblog.ir/
#  @package PHP-web-Browser
#  @Version 1.0.0
#  @homePage  http://DBlog.ir/
#   
#   Open web page simply...
#   
#   
#   
#
*/

/******* 

$ff = new Browser();

this methode for debuging and preview
by defualt $debug is false

		$ff->Debug(true); 



Add header For http Request
		$ff->AddHeader("Header","Value");
		
Get Cookies
		$ff->GetCookie();

Add Cookie
		$ff->AddCookie("cookie name","cookie value");
		
Set Referer
		$ff->SetReferer("RefererAddress");
		

Open Page by GET
		$ff->Open("http://example.com/"); 
		
Open Page by POST
		$ff->Open("http://example.com/" , ""); 
		OR
		$ff->Open("http://example.com/" , "name=SeyyedAMir&homepage=dblog.ir"); 
		
		
Responce 
		$ff->Response['header'];
		$ff->Response['body'];
		
		Important :
		Address Start with Http OR https
		
		
********/

class Browser {
	private $URL;
	private $host;
	private $ip;
	private $port;
	private $protocol ;
	private $page ;
	private $headers = array();
	private $cookie = array();
	private $referer;
	private $data;
	
	private $debug = false;
	
	public $Response= array();
	public $ResponseHeader = array();
	
	function Debug($flag)
	{
		$this->debug = $flag;
	}
	
	function Open( $url , $data = null)
	{
		$this->url = $url;
		$this->addressParser($url);
		
		
		
		if($data == null)
		{
			$this->Get();
		}
		else
		{
			$this->data = $data;
			$this->Post();
		}
		
		return $this->Response['body'];
	}
	
	function GetAllData()
	{
		$arr['url'] = $this->url ;
		$arr['protocol'] = $this->protocol ;
		$arr['host'] = $this->host ;
		$arr['ip'] = $this->ip ;
		$arr['port'] = $this->port ;
		
		$arr['page'] = $this->page ;
		$arr['cookie'] = $this->translateCookie() ;
		$arr['referer'] = $this->referer ;
		
		return print_r($arr , true);
	
	}
	
	
	function AddHeader($name , $val)
	{
		$this->headers[] = $name . ": " . $val . "\r\n";
	}
	
	function GetCookie()
	{
		if(count($this->cookie) > 0)
			$cook =  "Cookie: ". $this->translateCookie();
			
		return $cook;
	}
	
	function AddCookie($name,$val)
	{
		$this->cookie[$name] = $val ;
	}

	function SetReferer($ref)
	{
		$this->referer = $ref ;
	}
	
	

	
	private function addressParser($url)
	{
		
		if(substr($url,0,4 /* http */) != "http")
			die("Bad Url : " . $url);
		
		
		$url_parse = parse_url($url);
		
		/* 'http://hostname/path?arg=value#anchor'
			*Array
			*(
			*	[scheme] => http
			*	[host] => hostname
			*	[path] => /path
			*	[query] => arg=value
			*	[fragment] => anchor
			*)
		*/
		$this->protocol = $url_parse['scheme'];
		
		$this->page = $url_parse['path'];
		
		if( empty( $this->page ) )
			$this->page = '/';
		
		if( !empty( $url_parse['query'] ) )
			$this->page .= '?'.$url_parse['query'];
		
		if( isset( $url_parse['port'] ) && !empty( $url_parse['port'] ) )
			$this->port = $url_parse['port'];
		else if($this->protocol == "https")
			$this->port = 443;
		else
			$this->port = 80;
		
		// if  IP
		if(!preg_match("/^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+$/",$url_parse['host']))
		{
			$this->ip = gethostbyname($url_parse['host']);
			
			if(is_array($this->ip))
				$this->ip = $this->ip[0];
			
			$this->host = $url_parse['host'];
		}
		else
		{
			$this->ip  = $url_parse['host'];
			$this->host = $url_parse['host'];
		}

	
		$this->Log("Get Data OK\r\n".$this->GetAllData());
	}
	

	
	private function SetCookie($text)
	{
		
		if(preg_match("/Set-Cookie/i",$text))
		{
			//  Set Cookie in Header    //////////////////////////////////////////////////////////////////////////+
			preg_match_all('(Set-Cookie: ([^;]+))', $text , $all_cookie);

			foreach($all_cookie[1] as $cook_val)
			{
					$parse = explode("=" , $cook_val , 2);
					
					if(count($parse) == 2 )
						$this->cookie[   trim($parse[0])  ] = trim($parse[1]);
			}

			$this->Log("Cookie Set : \r\n".$this->GetCookie());
			
			//////////////////////////////////////////////////////////////////////////////////////////////////////+
		}
		
		
		
	}
	

	private function CheckLocation()
	{
	 //in Next version (Enshallah :D)
		if(isset($this->ResponseHeader['location']))
		{
			$locat = $this->ResponseHeader['location'];

			if($locat[0] == '/')
			{
				$this->ResponseHeader['location'] = $this->protocol .'://'.$this->host.$locat;
			}
			else if(strstr($locat,'://') == false)
			{
				$this->ResponseHeader['location'] = $this->thisLocation() .'/'. $locat;
			}
			
			$this->Log('Change Location to : '.$this->ResponseHeader['location']);
			$this->Open($this->ResponseHeader['location']);
			return true;
		}
		
		return false;
	}
	
	private function thisLocation()
	{
		$locat = $this->url;
		$AskSign = strrpos($locat , '?');
		if($AskSign != false)
			$locat = substr($locat , 0 , $AskSign);
			
		$Slash = strrpos($locat , '/');	
		$locat = substr($locat , 0 , $Slash);
		
		return $locat;
	}
	
	private function OpenPage($hed)
	{
		$this->Response['header'] = $this->Response['body'] = $this->ResponseHeader = '';
		$this->data = '';
		$this->header = '';
		
		
		if($this->protocol == 'https')
			$fs = fsockopen('ssl://'.$this->ip , $this->port , $errn , $errs , 10) or die($this->errorLog("No sock Open in Class->Get \n".$errs));
		else
			$fs = fsockopen($this->ip , $this->port , $errn , $errs , 10) or die($this->errorLog("No sock Open in Class->Get \n".$errs));
		
		
		$this->Log("Open Host : ".$this->ip.":".$this->port);
		
		fwrite($fs,$hed,strlen($hed));

		// Get Header
		do{
			$Line = fgets($fs);
			$Res .= $Line;
		}while(!feof($fs) && $Line != "\r\n");

		$this->Response['header'] = $Res;
		$this->ResponseHeader  = $this->splitHeaders($Res);
		
		$this->Log("Get Header Response : \r\n".$this->Response['header']);
		
		$this->SetCookie($Res);
		
		if($this->CheckLocation() == true)
			return;
		
		
		if(isset($this->ResponseHeader['content-length']))
		{
			$contentLength = $this->ResponseHeader['content-length'];
			$this->Log("Content Lenght : ${contentLength}");
		}	
			
		$Res = '';
			
		if(!empty($contentLength))
		{
			$this->Log("Read ${contentLength} Data");

			$XLen = $contentLength;

			/*
			*   fread only Read 2048 byte
			*/

			do{
				if($XLen > 2048)
				{
					$Line = fread($fs,2048);
					$XLen -= strlen($Line);
				}
				else
				{
					$Line = fread($fs,$XLen);
					$XLen -= strlen($Line);
				}
				
				$Res .= $Line;
			}while(!feof($fs) && $XLen > 0);
			
			$this->Log("Read ".strlen($Res)." From URL");
		}
		else
		{
			do{
				$Line = fread($fs,1024);
				$Res .= $Line;
			}while(!feof($fs) && $Line != NULL);
		}
		
		
		$this->Response['body']  = $Res;
		
		if(strstr($this->ResponseHeader['content-encoding'] , "gzip") != false)
		{
			$this->Response['body'] = gzinflate(substr($this->Response['body'], 10));
			
			$this->Log("Gzip Data...\r\nBody Size : ".strlen($this->Response['body']));
		}
		
	
		$this->Log("Get Body : \r\n". htmlspecialchars ( $this->Response['body'] ));
	}
	
	private function splitHeaders($headerText)
	{
		
		if($headerText != "")
		{
			$hed = explode("\r\n" ,$headerText );
			
			$Headers = array();
			
			if(count($hed) > 1)
			{
				$isFirst = true;
				
				foreach($hed as $value)
				{
					if($isFirst)
					{
						$Headers[0] = $Headers['status'] = trim($value);
						$isFirst = false;
					}
					else
					{
						$lineSplit = explode(':',$value,2);
						if(count($lineSplit) == 2)
						{
							$headerKey = strtolower(trim($lineSplit[0]));
							$headerValue = trim($lineSplit[1]);
							$Headers[$headerKey] = $headerValue;
						}
					}
				}
				
				return $Headers;
				
			}
		}
		
		return array("");
	}
	
	private function Get()
	{
		$hed  = "GET ". $this->page ." HTTP/1.0 \r\n";
		$hed .= "Host: ". $this->host ." \r\n";
		$hed .= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9) Gecko/2008052906 Firefox/3.0 \r\n";
		$hed .= "Accept-Encoding: gzip \r\n";
		$hed .= "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8 \r\n";
		$hed .= "Accept-Language: en-us,en;q=0.5 \r\n";
		$hed .= "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7 \r\n";
		$hed .= "Connection: closed\r\n";
		
		foreach($this->headers as $val)
			$hed .= $val;
		
		if($this->referer)
			$hed .= "Referer: ". $this->referer ."\r\n";
		
		if(count($this->cookie) > 0)
			$hed .=  "Cookie: ". $this->translateCookie() . " \r\n";

		$hed .= "\r\n";

		
		$this->OpenPage($hed);
		
		
	}
	
	private function Post()
	{
		$hed  = "POST ". $this->page ." HTTP/1.0\r\n";
		$hed .= "Host: ". $this->host ." \r\n";
		$hed .= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9) Gecko/2008052906 Firefox/3.0 \r\n";
		$hed .= "Accept-Encoding: gzip \r\n";
		$hed .= "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8 \r\n";
		$hed .= "Accept-Language: en-us,en;q=0.5 \r\n";
		$hed .= "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7 \r\n";
		
		foreach($this->headers as $val)
			$hed .= $val;
		
		$hed .= "Connection: closed\r\n";

		foreach($this->headers as $val)
			$hed .= $val;
		
		if($this->referer)
			$hed .= "Referer: ". $this->referer ."\r\n";
		
		if(count($this->cookie) > 0)
			$hed .=  "Cookie: ". $this->translateCookie() . " \r\n";

			
		$hed .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$hed .= "Content-Length: ". strlen($this->data)."\r\n";
		$hed .= "\r\n";
		
		$hed .= $this->data;
		
		$this->OpenPage($hed);
	}
	
	
	function translateCookie()
	{
		$cook = '';
		
		if(!is_array($this->cookie))
			return '';
			
		foreach($this->cookie as $key => $value)
			$cook .= $key.'='.$value.';';
			
		return $cook;
	}
	
	
	function errorLog($text)
	{
		$this->Log("<b>Error : </b>" . $text);
	}
	
	private function Log($text)
	{
		if($this->debug == true)
			echo $text . "<hr>\r\n";
	}

}
?>