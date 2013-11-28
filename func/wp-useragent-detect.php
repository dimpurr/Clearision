<?php

// Detect Console or Mobile Device
function clrs_detect_device()
{
	global $useragent, $ua_show_text, $ua_text_links;

	// Apple
	if(preg_match('/iPad/i', $useragent))
	{
		$link="http://www.apple.com/itunes";
		$title="iPad";

		if(preg_match('/CPU\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" iOS ".str_replace("_", ".", $regmatch[1]);
		}

		$code="ipad";
	}
	elseif(preg_match('/iPod/i', $useragent))
	{
		$link="http://www.apple.com/itunes";
		$title="iPod";

		if(preg_match('/iPhone\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" iOS ".str_replace("_", ".", $regmatch[1]);
		}

		$code="iphone";
	}
	elseif(preg_match('/iPhone/i', $useragent))
	{
		$link="http://www.apple.com/iphone";
		$title="iPhone";

		if(preg_match('/iPhone\ OS\ ([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" iOS ".str_replace("_", ".", $regmatch[1]);
		}

		$code="iphone";
	}

	// BenQ-Siemens (Openwave)
	elseif(preg_match('/[^M]SIE/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/BenQ-Siemens";
		$title="BenQ-Siemens";

		if(preg_match('/[^M]SIE-([.0-9a-zA-Z]+)\//i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="benq-siemens";
	}

	// BlackBerry
	elseif(preg_match('/BlackBerry/i', $useragent))
	{
		$link="http://www.blackberry.com/";
		$title="BlackBerry";

		if(preg_match('/blackberry([.0-9a-zA-Z]+)\//i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="blackberry";
	}

	// Dell
	elseif(preg_match('/Dell Mini 5/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Dell_Streak";
		$title="Dell Mini 5";
		$code="dell";
	}
	elseif(preg_match('/Dell Streak/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Dell_Streak";
		$title="Dell Streak";
		$code="dell";
	}
	elseif(preg_match('/Dell/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/Dell";
		$title="Dell";
		$code="dell";
	}

	// Google
	elseif(preg_match('/Nexus One/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Nexus_One";
		$title="Nexus One";
		$code="google-nexusone";
	}

	// HTC
	elseif(preg_match('/Desire/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/HTC_Desire";
		$title="HTC Desire";
		$code="htc";
	}
	elseif(preg_match('/Rhodium/i', $useragent)
		|| preg_match('/HTC[_|\ ]Touch[_|\ ]Pro2/i', $useragent)
		|| preg_match('/WMD-50433/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/HTC_Touch_Pro2";
		$title="HTC Touch Pro2";
		$code="htc";
	}
	elseif(preg_match('/HTC[_|\ ]Touch[_|\ ]Pro/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/HTC_Touch_Pro";
		$title="HTC Touch Pro";
		$code="htc";
	}
	elseif(preg_match('/HTC/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/High_Tech_Computer_Corporation";
		$title="HTC";

		if(preg_match('/HTC[\ |_|-]8500/i', $useragent))
		{
			$link="http://en.wikipedia.org/wiki/HTC_Startrek";
			$title.=" Startrek";
		}
		elseif(preg_match('/HTC[\ |_|-]Hero/i', $useragent))
		{
			$link="http://en.wikipedia.org/wiki/HTC_Hero";
			$title.=" Hero";
		}
		elseif(preg_match('/HTC[\ |_|-]Legend/i', $useragent))
		{
			$link="http://en.wikipedia.org/wiki/HTC_Legend";
			$title.=" Legend";
		}
		elseif(preg_match('/HTC[\ |_|-]Magic/i', $useragent))
		{
			$link="http://en.wikipedia.org/wiki/HTC_Magic";
			$title.=" Magic";
		}
		elseif(preg_match('/HTC[\ |_|-]P3450/i', $useragent))
		{
			$link="http://en.wikipedia.org/wiki/HTC_Touch";
			$title.=" Touch";
		}
		elseif(preg_match('/HTC[\ |_|-]P3650/i', $useragent))
		{
			$link="http://en.wikipedia.org/wiki/HTC_Polaris";
			$title.=" Polaris";
		}
		elseif(preg_match('/HTC[\ |_|-]S710/i', $useragent))
		{
			$link="http://en.wikipedia.org/wiki/HTC_S710";
			$title.=" S710";
		}
		elseif(preg_match('/HTC[\ |_|-]Tattoo/i', $useragent))
		{
			$link="http://en.wikipedia.org/wiki/HTC_Tattoo";
			$title.=" Tattoo";
		}
		elseif(preg_match('/HTC[\ |_|-]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}
		elseif(preg_match('/HTC([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=str_replace("_", " ", $regmatch[1]);
		}

		$code="htc";
	}

	// Kindle
	elseif(preg_match('/Kindle/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Amazon_Kindle";
		$title="Kindle";

		if(preg_match('/Kindle\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="kindle";
	}

	// LG
	elseif(preg_match('/LG/i', $useragent))
	{
		$link="http://www.lgmobile.com";
		$title="LG";

		if(preg_match('/LG[E]?[\ |-|\/]([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="lg";
	}

	// Microsoft
	elseif(preg_match('/Windows Phone OS 7.0/i', $useragent)
		|| preg_match('/ZuneWP7/i', $useragent)
		|| preg_match('/WP7/i', $useragent))
	{
		$link="http://www.microsoft.com/windowsphone/";
		$title.="Windows Phone 7";
		$code="wp7";
	}

	// Motorola
	elseif(preg_match('/\ Droid/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Motorola_Droid";
		$title.="Motorola Droid";
		$code="motorola";
	}
	elseif(preg_match('/XT720/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Motorola";
		$title.="Motorola Motoroi (XT720)";
		$code="motorola";
	}
	elseif(preg_match('/MOT-/i', $useragent)
		|| preg_match('/MIB/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Motorola";
		$title="Motorola";

		if(preg_match('/MOTO([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}
		if(preg_match('/MOT-([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="motorola";
	}
	elseif(preg_match('/XOOM/i', $useragent)){
		$link="http://en.wikipedia.org/wiki/Motorola_Xoom";
		$title.="Motorola Xoom";
		$code="motorola";
	}

	// Nintendo
	elseif(preg_match('/Nintendo/i', $useragent))
	{
		$title="Nintendo";

		if(preg_match('/Nintendo DSi/i', $useragent))
		{
			$link="http://www.nintendodsi.com/";
			$title.=" DSi";
			$code="nintendodsi";
		}
		elseif(preg_match('/Nintendo DS/i', $useragent))
		{
			$link="http://www.nintendo.com/ds";
			$title.=" DS";
			$code="nintendods";
		}
		elseif(preg_match('/Nintendo WiiU/i', $useragent))
		{
			$link="http://www.nintendo.com/wiiu";
			$title.=" Wii U";
			$code="nintendowiiu";
		}
		elseif(preg_match('/Nintendo Wii/i', $useragent))
		{
			$link="http://www.nintendo.com/wii";
			$title.=" Wii";
			$code="nintendowii";
		}
		else
		{
			$link="http://www.nintendo.com/";
			$code="nintendo";
		}
	}

	// Nokia
	elseif(preg_match('/Nokia/i', $useragent)
		&& !preg_match('/S(eries)?60/i', $useragent))
	{
		$link="http://www.nokia.com/";
		$title="Nokia";
		if(preg_match('/Nokia(E|N)?([0-9]+)/i', $useragent, $regmatch))
			$title.=" ".$regmatch[1].$regmatch[2];
		$code="nokia";
	}
	elseif(preg_match('/S(eries)?60/i', $useragent))
	{
		$link="http://www.s60.com/";
		$title="Nokia Series60";
		$code="nokia";
	}

	// OLPC (One Laptop Per Child)
	elseif(preg_match('/OLPC/i', $useragent))
	{
		$link="http://www.laptop.org/";
		$title="OLPC (XO)";
		$code="olpc";
	}

	// Palm
	elseif(preg_match('/\ Pixi\//i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Palm_Pixi";
		$title="Palm Pixi";
		$code="palm";
	}
	elseif(preg_match('/\ Pre\//i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Palm_Pre";
		$title="Palm Pre";
		$code="palm";
	}
	elseif(preg_match('/Palm/i', $useragent))
	{
		$link="http://www.palm.com/";
		$title="Palm";
		$code="palm";
	}
	elseif(preg_match('/wp-webos/i', $useragent))
	{
		$link="http://www.palm.com/";
		$title="Palm";
		$code="palm";
	}

	// Playstation
	elseif(preg_match('/PlayStation/i', $useragent))
	{
		$title="PlayStation";

		if(preg_match('/[PS|PlayStation\ ]3/i', $useragent))
		{
			$link="http://www.us.playstation.com/PS3";
			$title.=" 3";
		}
		elseif(preg_match('/[PlayStation Portable|PSP]/i', $useragent))
		{
			$link="http://www.us.playstation.com/PSP";
			$title.=" Portable";
		}
		elseif(preg_match('/[PlayStation Vita|PSVita]/i', $useragent))
		{
			$link="http://us.playstation.com/psvita/";
			$title.=" Vita";
		}
		else
		{
			$link="http://www.us.playstation.com/";
		}

		$code="playstation";
	}

	// Samsung
	elseif(preg_match('/Galaxy Nexus/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Galaxy_Nexus";
		$title="Galaxy Nexus";
		$code="samsung";
	}
	elseif(preg_match('/SmartTV/i', $useragent))
	{
		$link="http://www.freethetvchallenge.com/details/faq";
		$title="Samsung Smart TV";
		$code="samsung";
	}
	elseif(preg_match('/Samsung/i', $useragent))
	{
		$link="http://www.samsungmobile.com/";
		$title="Samsung";

		if(preg_match('/Samsung-([.\-0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="samsung";
	}

	// Sony Ericsson
	elseif(preg_match('/SonyEricsson/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/SonyEricsson";
		$title="SonyEricsson";

		if(preg_match('/SonyEricsson([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			if(strtolower($regmatch[1])==strtolower("U20i"))
			{
				$title.=" Xperia X10 Mini Pro";
			}
			else
			{
				$title.=" ".$regmatch[1];
			}
		}

		$code="sonyericsson";
	}

	// Windows Phone
	elseif(preg_match('/wp-windowsphone/i', $useragent))
	{
		$link="http://www.windowsphone.com/";
		$title="Windows Phone";
		$code="windowsphone";
	}

	// No Device match
	else
	{
		return "";
	}

	// How should we display this?
	
	//image and text
	$detected_device=clrs_img($code, "/device/", $title)."<span class='cmt_ua_n'>".$title."</span>";
	return $detected_device;
}

// Detect Trackbacks...
function clrs_detect_trackback()
{
	global $useragent, $ua_trackback, $ua_show_text, $ua_text_links, $ua_hide_unknown_bool;

	$ua_trackback=0;

	if(preg_match('/Drupal/i', $useragent))
	{
		$link="http://www.drupal.org/";
		$title="Drupal";
		$code="drupal";
	}
	elseif(preg_match('/Feedburner/i', $useragent))
	{
		$link="http://www.feedburner.com/";
		$title="FeedBurner";
		$code="feedburner";
	}
	elseif(preg_match('/laconica|statusnet/i', $useragent))
	{
		$link="http://status.net/";
		$title="StatusNet";
		$code="laconica";
	}
	elseif(preg_match('/libwww-perl\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://search.cpan.org/dist/libwww-perl/";
		$title="libwww-perl";
		$code="null";
		$version=$regmatch[1];
	}
	elseif(preg_match('/meneame/i', $useragent))
	{
		$link="http://www.meneame.net/";
		$title="Meneame";
		$code="meneame";
	}
	elseif(preg_match('/MovableType\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://www.movabletype.org/";
		$title="MovableType";
		$code="movabletype";
		$version=$regmatch[1];
	}
	elseif(preg_match('/Peach\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://www.psych.neu.edu/faculty/y.petrov/Software/PEACH/";
		$title="Peach";
		$code="null";
		$version=$regmatch[1];
	}
	elseif(preg_match('/pligg/i', $useragent))
	{
		$link="http://www.pligg.com/";
		$title="Pligg";
		$code="pligg";
	}
	elseif(preg_match('/Python-urllib\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://docs.python.org/library/urllib.html";
		$title="Python-urllib";
		$code="null";
		$version=$regmatch[1];
	}
	elseif(preg_match('/Snoopy\ v([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://sourceforge.net/projects/snoopy/";
		$title="Snoopy";
		$code="null";
		$version=$regmatch[1];
	}
	elseif(preg_match('/SOAP::/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/SOAP";
		$title="SOAP (Simple Object Access Protocol)";
		$code.="null";
	}
	elseif(preg_match('/Typepad/i', $useragent))
	{
		$link="http://www.typepad.com/";
		$title="Typepad";
		$code.="typepad";
	}
	elseif(preg_match('/vBSEO/i', $useragent))
	{
		$link="http://www.vbseo.com/";
		$title="vBSEO (VBulletin)";
		$code.="vbseo";
	}
	elseif(preg_match('/WordPress\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
	{
		$link="http://www.wordpress.org/";
		$title="WordPress";
		$code="wordpress";
		$version=$regmatch[1];
	}
	elseif(preg_match('/XML-RPC/i', $useragent))
	{
		$link="http://www.xmlrpc.com/";
		$title="XML-RPC";
		$code.="null";
	}
	else
	{
		$link="#";
		$title="Unknown";
		$code="null";

		if($ua_hide_unknown_bool=='true'
			&& $ua_show_text==2)
		{
			return $title;
		}
	}

	$title.=" ".$version;

	// How should we display this?
	//image and text
	$detected_tb=clrs_img($code, "/trackback/", $title)."<span class='cmt_ua_n'>".$title."</span>";

	return $detected_tb;
}


// Detect Operating System
function clrs_detect_os()
{
	global $useragent, $ua_show_text, $ua_text_links;

	if(preg_match('/AmigaOS/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/AmigaOS";
		$title="AmigaOS";

		if(preg_match('/AmigaOS\ ([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="amigaos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Android/i', $useragent))
	{
		$link="http://www.android.com/";
		$title="Android";
		$code="android";

		if(preg_match('/Android[\ |\/]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$version=$regmatch[1];
			$title.=" ".$version;
		}

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/[^A-Za-z]Arch/i', $useragent))
	{
		$link="http://www.archlinux.org/";
		$title="Arch Linux";
		$code="archlinux";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/BeOS/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/BeOS";
		$title="BeOS";
		$code="beos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/CentOS/i', $useragent))
	{
		$link="http://www.centos.org/";
		$title="CentOS";

		if(preg_match('/.el([.0-9a-zA-Z]+).centos/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="centos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Chakra/i', $useragent))
	{
		$link="http://www.chakra-linux.org/";
		$title="Chakra Linux";
		$code="chakra";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/CrOS/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Google_Chrome_OS";
		$title="Google Chrome OS";
		$code="chromeos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Crunchbang/i', $useragent))
	{
		$link="http://www.crunchbanglinux.org/";
		$title="Crunchbang";
		$code="crunchbang";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Debian/i', $useragent))
	{
		$link="http://www.debian.org/";
		$title="Debian GNU/Linux";
		$code="debian";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/DragonFly/i', $useragent))
	{
		$link="http://www.dragonflybsd.org/";
		$title="DragonFly BSD";
		$code="dragonflybsd";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Edubuntu/i', $useragent))
	{
		$link="http://www.edubuntu.org/";
		$title="Edubuntu";

		if(preg_match('/Edubuntu[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$version.=" ".$regmatch[1];
		}

		if($regmatch[1] < 10)
		{
			$code="edubuntu-1";
		}
		else
		{
			$code="edubuntu-2";
		}

		if(strlen($version) > 1)
		{
			$title.=$version;
		}

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Fedora/i', $useragent))
	{
		$link="http://www.fedoraproject.org/";
		$title="Fedora";

		if(preg_match('/.fc([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="fedora";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Foresight\ Linux/i', $useragent))
	{
		$link="http://www.foresightlinux.org/";
		$title="Foresight Linux";

		if(preg_match('/Foresight\ Linux\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="foresight";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/FreeBSD/i', $useragent))
	{
		$link="http://www.freebsd.org/";
		$title="FreeBSD";
		$code="freebsd";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Gentoo/i', $useragent))
	{
		$link="http://www.gentoo.org/";
		$title="Gentoo";
		$code="gentoo";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Inferno/i', $useragent))
	{
		$link="http://www.vitanuova.com/inferno/";
		$title="Inferno";
		$code="inferno";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/IRIX/i', $useragent))
	{
		$link="http://www.sgi.com/partners/?/technology/irix/";
		$title="IRIX Linux";

		if(preg_match('/IRIX(64)?\ ([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			if($regmatch[1])
			{
				$title.=" x".$regmatch[1];
			}
			if($regmatch[2])
			{
				$title.=" ".$regmatch[2];
			}
		}

		$code="irix";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Kanotix/i', $useragent))
	{
		$link="http://www.kanotix.com/";
		$title="Kanotix";
		$code="kanotix";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Knoppix/i', $useragent))
	{
		$link="http://www.knoppix.net/";
		$title="Knoppix";
		$code="knoppix";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Kubuntu/i', $useragent))
	{
		$link="http://www.kubuntu.org/";
		$title="Kubuntu";

		if(preg_match('/Kubuntu[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$version.=" ".$regmatch[1];
		}

		if($regmatch[1] < 10)
		{
			$code="kubuntu-1";
		}
		else
		{
			$code="kubuntu-2";
		}

		if(strlen($version) > 1)
		{
			$title.=$version;
		}

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/LindowsOS/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Lsongs";
		$title="LindowsOS";
		$code="lindowsos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Linspire/i', $useragent))
	{
		$link="http://www.linspire.com/";
		$title="Linspire";
		$code="lindowsos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Linux\ Mint/i', $useragent))
	{
		$link="http://www.linuxmint.com/";
		$title="Linux Mint";

		if(preg_match('/Linux\ Mint\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="linuxmint";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Lubuntu/i', $useragent))
	{
		$link="http://www.lubuntu.net/";
		$title="Lubuntu";

		if(preg_match('/Lubuntu[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$version.=" ".$regmatch[1];
		}

		if($regmatch[1] < 10)
		{
			$code="lubuntu-1";
		}
		else
		{
			$code="lubuntu-2";
		}

		if(strlen($version) > 1)
		{
			$title.=$version;
		}

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Mac/i', $useragent)
		|| preg_match('/Darwin/i', $useragent))
	{
		$link="http://www.apple.com/macosx/";

		if(preg_match('/Mac OS X/i', $useragent))
		{
			$title=substr($useragent, strpos(strtolower($useragent), strtolower("Mac OS X")));
			$title=substr($title, 0, strpos($title, ")"));

			if(strpos($title, ";"))
			{
				$title=substr($title, 0, strpos($title, ";"));
			}

			$title=str_replace("_", ".", $title);
			$code="mac-3";
		}
		elseif(preg_match('/Mac OSX/i', $useragent))
		{
			$title=substr($useragent, strpos(strtolower($useragent), strtolower("Mac OS X")));
			$title=substr($title, 0, strpos($title, ")"));

			if(strpos($title, ";"))
			{
				$title=substr($title, 0, strpos($title, ";"));
			}

			$title=str_replace("_", ".", $title);
			$code="mac-2";
		}
		elseif(preg_match('/Darwin/i', $useragent))
		{
			$title="Mac OS Darwin";
			$code="mac-1";
		}
		else
		{
			$title="Macintosh";
			$code="mac-1";
		}
	}
	elseif(preg_match('/Mageia/i', $useragent))
	{
		$link="http://www.mageia.org/";
		$title="Mageia";
		$code="mageia";
	}
	elseif(preg_match('/Mandriva/i', $useragent))
	{
		$link="http://www.mandriva.com/";
		$title="Mandriva";

		if(preg_match('/mdv([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="mandriva";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/moonOS/i', $useragent))
	{
		$link="http://www.moonos.org/";
		$title="moonOS";

		if(preg_match('/moonOS\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="moonos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/MorphOS/i', $useragent))
	{
		$link="http://www.morphos-team.net/";
		$title="MorphOS";
		$code="morphos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/NetBSD/i', $useragent))
	{
		$link="http://www.netbsd.org/";
		$title="NetBSD";
		$code="netbsd";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Nova/i', $useragent))
	{
		$link="http://www.nova.cu";
		$title="Nova";

		if(preg_match('/Nova[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$version.=" ".$regmatch[1];
		}

		if(strlen($version) > 1)
		{
			$title.=$version;
		}

		$code="nova";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/OpenBSD/i', $useragent))
	{
		$link="http://www.openbsd.org/";
		$title="OpenBSD";
		$code="openbsd";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Oracle/i', $useragent))
	{
		$link="http://www.oracle.com/us/technologies/linux/";
		$title="Oracle";

		if(preg_match('/.el([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" Enterprise Linux ".str_replace("_", ".", $regmatch[1]);
		}
		else
		{
			$title.=" Linux";
		}

		$code="oracle";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Pardus/i', $useragent))
	{
		$link="http://www.pardus.org.tr/en/";
		$title="Pardus";
		$code="pardus";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/PCLinuxOS/i', $useragent))
	{
		$link="http://www.pclinuxos.com/";
		$title="PCLinuxOS";

		if(preg_match('/PCLinuxOS\/[.\-0-9a-zA-Z]+pclos([.\-0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".str_replace("_", ".", $regmatch[1]);
		}

		$code="pclinuxos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Red\ Hat/i', $useragent)
		|| preg_match('/RedHat/i', $useragent))
	{
		$link="http://www.redhat.com/";
		$title="Red Hat";

		if(preg_match('/.el([._0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" Enterprise Linux ".str_replace("_", ".", $regmatch[1]);
		}

		$code="red-hat";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Rosa/i', $useragent))
	{
		$link="http://www.rosalab.com/";
		$title="Rosa Linux";
		$code="rosa";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Sabayon/i', $useragent))
	{
		$link="http://www.sabayonlinux.org/";
		$title="Sabayon Linux";
		$code="sabayon";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Slackware/i', $useragent))
	{
		$link="http://www.slackware.com/";
		$title="Slackware";
		$code="slackware";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Solaris/i', $useragent))
	{
		$link="http://www.sun.com/software/solaris/";
		$title="Solaris";
		$code="solaris";
	}
	elseif(preg_match('/SunOS/i', $useragent))
	{
		$link="http://www.sun.com/software/solaris/";
		$title="Solaris";
		$code="solaris";
	}
	elseif(preg_match('/Suse/i', $useragent))
	{
		$link="http://www.opensuse.org/";
		$title="openSUSE";
		$code="suse";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Symb[ian]?[OS]?/i', $useragent))
	{
		$link="http://www.symbianos.org/";
		$title="SymbianOS";

		if(preg_match('/Symb[ian]?[OS]?\/([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$title.=" ".$regmatch[1];
		}

		$code="symbianos";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Unix/i', $useragent))
	{
		$link="http://www.unix.org/";
		$title="Unix";
		$code="unix";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/VectorLinux/i', $useragent))
	{
		$link="http://www.vectorlinux.com/";
		$title="VectorLinux";
		$code="vectorlinux";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Venenux/i', $useragent))
	{
		$link="http://www.venenux.org/";
		$title="Venenux GNU Linux";
		$code="venenux";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/webOS/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/WebOS";
		$title="Palm webOS";
		$code="palm";
	}
	elseif(preg_match('/Windows/i', $useragent)
		|| preg_match('/WinNT/i', $useragent)
		|| preg_match('/Win32/i', $useragent))
	{
		$link="http://www.microsoft.com/windows/";

		if(preg_match('/Windows NT 6.3; Win64; x64;/i', $useragent)
			|| preg_match('/Windows NT 6.3; WOW64/i', $useragent))
		{
			 $title="Windows 8.1 x64 Edition";
			 $code="win-5";
		}
		elseif(preg_match('/Windows NT 6.3/i', $useragent))
		{
			 $title="Windows 8.1";
			 $code="win-5";
		}
		elseif(preg_match('/Windows NT 6.2; Win64; x64;/i', $useragent)
			|| preg_match('/Windows NT 6.2; WOW64/i', $useragent))
		{
			$title="Windows 8 x64 Edition";
			$code="win-5";
		}
		elseif(preg_match('/Windows NT 6.2/i', $useragent))
		{
			$title="Windows 8";
			$code="win-5";
		}
		elseif(preg_match('/Windows NT 6.1; Win64; x64;/i', $useragent)
			|| preg_match('/Windows NT 6.1; WOW64/i', $useragent))
		{
			$title="Windows 7 x64 Edition";
			$code="win-4";
		}
		elseif(preg_match('/Windows NT 6.1/i', $useragent))
		{
			$title="Windows 7";
			$code="win-4";
		}
		elseif(preg_match('/Windows NT 6.0/i', $useragent))
		{
			$title="Windows Vista";
			$code="win-3";
		}
		elseif(preg_match('/Windows NT 5.2 x64/i', $useragent))
		{
			$title="Windows XP x64 Edition";
			$code="win-2";
		}
		elseif(preg_match('/Windows NT 5.2; Win64; x64;/i', $useragent))
		{
			$title="Windows Server 2003 x64 Edition";
			$code="win-2";
		}
		elseif(preg_match('/Windows NT 5.2/i', $useragent))
		{
			$title="Windows Server 2003";
			$code="win-2";
		}
		elseif(preg_match('/Windows NT 5.1/i', $useragent)
			|| preg_match('/Windows XP/i', $useragent))
		{
			$title="Windows XP";
			$code="win-2";
		}
		elseif(preg_match('/Windows NT 5.01/i', $useragent))
		{
			$title="Windows 2000, Service Pack 1 (SP1)";
			$code="win-1";
		}
		elseif(preg_match('/Windows NT 5.0/i', $useragent)
			|| preg_match('/Windows 2000/i', $useragent))
		{
			$title="Windows 2000";
			$code="win-1";
		}
		elseif(preg_match('/Windows NT 4.0/i', $useragent)
			|| preg_match('/WinNT4.0/i', $useragent))
		{
			$title="Microsoft Windows NT 4.0";
			$code="win-1";
		}
		elseif(preg_match('/Windows NT 3.51/i', $useragent)
			|| preg_match('/WinNT3.51/i', $useragent))
		{
			$title="Microsoft Windows NT 3.11";
			$code="win-1";
		}
		elseif(preg_match('/Windows 3.11/i', $useragent)
			|| preg_match('/Win3.11/i', $useragent)
			|| preg_match('/Win16/i', $useragent))
		{
			$title="Microsoft Windows 3.11";
			$code="win-1";
		}
		elseif(preg_match('/Windows 3.1/i', $useragent))
		{
			$title="Microsoft Windows 3.1";
			$code="win-1";
		}
		elseif(preg_match('/Windows 98; Win 9x 4.90/i', $useragent)
			|| preg_match('/Win 9x 4.90/i', $useragent)
			|| preg_match('/Windows ME/i', $useragent))
		{
			$title="Windows Millennium Edition (Windows Me)";
			$code="win-1";
		}
		elseif(preg_match('/Win98/i', $useragent))
		{
			$title="Windows 98 SE";
			$code="win-1";
		}
		elseif(preg_match('/Windows 98/i', $useragent)
			|| preg_match('/Windows\ 4.10/i', $useragent))
		{
			$title="Windows 98";
			$code="win-1";
		}
		elseif(preg_match('/Windows 95/i', $useragent)
			|| preg_match('/Win95/i', $useragent))
		{
			$title="Windows 95";
			$code="win-1";
		}
		elseif(preg_match('/Windows CE/i', $useragent))
		{
			$title="Windows CE";
			$code="win-2";
		}
		elseif(preg_match('/WM5/i', $useragent))
		{
			$title="Windows Mobile 5";
			$code="win-phone";
		}
		elseif(preg_match('/WindowsMobile/i', $useragent))
		{
			$title="Windows Mobile";
			$code="win-phone";
		}
		else
		{
			$title="Windows";
			$code="win-2";
		}
	}
	elseif(preg_match('/Xandros/i', $useragent))
	{
		$link="http://www.xandros.com/";
		$title="Xandros";
		$code="xandros";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Xubuntu/i', $useragent))
	{
		$link="http://www.xubuntu.org/";
		$title="Xubuntu";

		if(preg_match('/Xubuntu[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$version.=" ".$regmatch[1];
		}

		if($regmatch[1] < 10)
		{
			$code="xubuntu-1";
		}
		else
		{
			$code="xubuntu-2";
		}

		if(strlen($version) > 1)
		{
			$title.=$version;
		}

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Zenwalk/i', $useragent))
	{
		$link="http://www.zenwalk.org/";
		$title="Zenwalk GNU Linux";
		$code="zenwalk";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}

	// Pulled out of order to help ensure better detection for above platforms
	elseif(preg_match('/Ubuntu/i', $useragent))
	{
		$link="http://www.ubuntu.com/";
		$title="Ubuntu";

		if(preg_match('/Ubuntu[\/|\ ]([.0-9a-zA-Z]+)/i', $useragent, $regmatch))
		{
			$version.=" ".$regmatch[1];
		}

		if($regmatch[1] < 10)
		{
			$code="ubuntu-1";
		}
		else
		{
			$code="ubuntu-2";
		}

		if(strlen($version) > 1)
		{
			$title.=$version;
		}

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/Linux/i', $useragent))
	{
		$link="http://www.linux.org/";
		$title="GNU/Linux";
		$code="linux";

		if(preg_match('/x86_64/i', $useragent))
		{
			$title.=" x64";
		}
	}
	elseif(preg_match('/J2ME\/MIDP/i', $useragent))
	{
		$link="http://java.sun.com/javame/";
		$title="J2ME/MIDP Device";
		$code="java";
	}
	else
	{
		return "";
	}

	// How should we display this?
	//image and text
	$detected_os=clrs_img($code, "/os/", $title)."<span class='cmt_ua_n'>".$title."</span>";
	return $detected_os;
}


// Detect Web Browsers
function clrs_detect_webbrowser()
{
	global $useragent, $ua_show_text, $ua_text_links, $ua_hide_unknown_bool;

	$mobile=0;

	if(preg_match('/360se/i', $useragent))
	{
		$link="http://se.360.cn/";
		$title="360Safe Explorer";
		$code="360se";
	}
	elseif(preg_match('/Abolimba/i', $useragent))
	{
		$link="http://www.aborange.de/products/freeware/abolimba-multibrowser.php";
		$title="Abolimba";
		$code="abolimba";
	}
	elseif(preg_match('/Acoo\ Browser/i', $useragent))
	{
		$link="http://www.acoobrowser.com/";
		$title="Acoo ".clrs_detect_browser_version("Browser");
		$code="acoobrowser";
	}
	elseif(preg_match('/Alienforce/i', $useragent))
	{
		$link="http://sourceforge.net/projects/alienforce/";
		$title=clrs_detect_browser_version("Alienforce");
		$code="alienforce";
	}
	elseif(preg_match('/Amaya/i', $useragent))
	{
		$link="http://www.w3.org/Amaya/";
		$title=clrs_detect_browser_version("Amaya");
		$code="amaya";
	}
	elseif(preg_match('/Amiga-AWeb/i', $useragent))
	{
		$link="http://aweb.sunsite.dk/";
		$title="Amiga ".clrs_detect_browser_version("AWeb");
		$code="amiga-aweb";
	}
	elseif(preg_match('/America\ Online\ Browser/i', $useragent))
	{
		$link="http://downloads.channel.aol.com/browser";
		$title="America Online ".clrs_detect_browser_version("Browser");
		$code="aol";
	}
	elseif(preg_match('/AmigaVoyager/i', $useragent))
	{
		$link="http://v3.vapor.com/voyager/";
		$title="Amiga ".clrs_detect_browser_version("Voyager");
		$code="amigavoyager";
	}
	elseif(preg_match('/AOL/i', $useragent))
	{
		$link="http://downloads.channel.aol.com/browser";
		$title=clrs_detect_browser_version("AOL");
		$code="aol";
	}
	elseif(preg_match('/Arora/i', $useragent))
	{
		$link="http://code.google.com/p/arora/";
		$title=clrs_detect_browser_version("Arora");
		$code="arora";
	}
	elseif(preg_match('/AtomicBrowser/i', $useragent))
	{
		$link="http://www.atomicwebbrowser.com/";
		$title=clrs_detect_browser_version("AtomicBrowser");
		$code="atomicwebbrowser";
	}
	elseif(preg_match('/Avant\ Browser/i', $useragent))
	{
		$link="http://www.avantbrowser.com/";
		$title="Avant ".clrs_detect_browser_version("Browser");
		$code="avantbrowser";
	}
	elseif(preg_match('/baidubrowser/i', $useragent))
	{
		$link="http://liulanqi.baidu.com/";
		$title=clrs_detect_browser_version("Browser");
		$code="baidubrowser";
	}
	elseif(preg_match('/BarcaPro/i', $useragent))
	{
		$link="http://www.pocosystems.com/home/index.php?option=content&task=category&sectionid=2&id=9&Itemid=27";
		$title=clrs_detect_browser_version("BarcaPro");
		$code="barca";
	}
	elseif(preg_match('/Barca/i', $useragent))
	{
		$link="http://www.pocosystems.com/home/index.php?option=content&task=category&sectionid=2&id=9&Itemid=27";
		$title=clrs_detect_browser_version("Barca");
		$code="barca";
	}
	elseif(preg_match('/Beamrise/i', $useragent))
	{
		$link="http://www.beamrise.com/";
		$title=clrs_detect_browser_version("Beamrise");
		$code="beamrise";
	}
	elseif(preg_match('/Beonex/i', $useragent))
	{
		$link="http://www.beonex.com/";
		$title=clrs_detect_browser_version("Beonex");
		$code="beonex";
	}
	elseif(preg_match('/BlackBerry/i', $useragent))
	{
		$link="http://www.blackberry.com/";
		$title=clrs_detect_browser_version("BlackBerry");
		$code="blackberry";
	}
	elseif(preg_match('/Blackbird/i', $useragent))
	{
		$link="http://www.blackbirdbrowser.com/";
		$title=clrs_detect_browser_version("Blackbird");
		$code="blackbird";
	}
	elseif(preg_match('/BlackHawk/i', $useragent))
	{
		$link="http://www.netgate.sk/blackhawk/help/welcome-to-blackhawk-web-browser.html";
		$title=clrs_detect_browser_version("BlackHawk");
		$code="blackhawk";
	}
	elseif(preg_match('/Blazer/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Blazer_(web_browser)";
		$title=clrs_detect_browser_version("Blazer");
		$code="blazer";
	}
	elseif(preg_match('/Bolt/i', $useragent))
	{
		$link="http://www.boltbrowser.com/";
		$title=clrs_detect_browser_version("Bolt");
		$code="bolt";
	}
	elseif(preg_match('/BonEcho/i', $useragent))
	{
		$link="http://www.mozilla.org/projects/minefield/";
		$title=clrs_detect_browser_version("BonEcho");
		$code="firefoxdevpre";
	}
	elseif(preg_match('/BrowseX/i', $useragent))
	{
		$link="http://pdqi.com/browsex/";
		$title="BrowseX";
		$code="browsex";
	}
	elseif(preg_match('/Browzar/i', $useragent))
	{
		$link="http://www.browzar.com/";
		$title=clrs_detect_browser_version("Browzar");
		$code="browzar";
	}
	elseif(preg_match('/Bunjalloo/i', $useragent))
	{
		$link="http://code.google.com/p/quirkysoft/";
		$title=clrs_detect_browser_version("Bunjalloo");
		$code="bunjalloo";
	}
	elseif(preg_match('/Camino/i', $useragent))
	{
		$link="http://www.caminobrowser.org/";
		$title=clrs_detect_browser_version("Camino");
		$code="camino";
	}
	elseif(preg_match('/Cayman\ Browser/i', $useragent))
	{
		$link="http://www.caymanbrowser.com/";
		$title="Cayman ".clrs_detect_browser_version("Browser");
		$code="caymanbrowser";
	}
	elseif(preg_match('/Charon/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Charon_(web_browser)";
		$title=clrs_detect_browser_version("Charon");
		$code="null";
	}
	elseif(preg_match('/Cheshire/i', $useragent))
	{
		$link="http://downloads.channel.aol.com/browser";
		$title=clrs_detect_browser_version("Cheshire");
		$code="aol";
	}
	elseif(preg_match('/Chimera/i', $useragent))
	{
		$link="http://www.chimera.org/";
		$title=clrs_detect_browser_version("Chimera");
		$code="null";
	}
	elseif(preg_match('/chromeframe/i', $useragent))
	{
		$link="http://code.google.com/chrome/chromeframe/";
		$title=clrs_detect_browser_version("chromeframe");
		$code="google";
	}
	elseif(preg_match('/ChromePlus/i', $useragent))
	{
		$link="http://www.chromeplus.org/";
		$title=clrs_detect_browser_version("ChromePlus");
		$code="chromeplus";
	}
	elseif(preg_match('/Iron/i', $useragent))
	{
		$link="http://www.srware.net/";
		$title="SRWare ".clrs_detect_browser_version("Iron");
		$code="srwareiron";
	}
	elseif(preg_match('/Chromium/i', $useragent))
	{
		$link="http://www.chromium.org/";
		$title=clrs_detect_browser_version("Chromium");
		$code="chromium";
	}
	elseif(preg_match('/Classilla/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Classilla";
		$title=clrs_detect_browser_version("Classilla");
		$code="classilla";
	}
	elseif(preg_match('/Columbus/i', $useragent))
	{
		$link="http://www.columbus-browser.com/";
		$title=clrs_detect_browser_version("Columbus");
		$code="columbus";
	}
	elseif(preg_match('/CometBird/i', $useragent))
	{
		$link="http://www.cometbird.com/";
		$title=clrs_detect_browser_version("CometBird");
		$code="cometbird";
	}
	elseif(preg_match('/Comodo_Dragon/i', $useragent))
	{
		$link="http://www.comodo.com/home/internet-security/browser.php";
		$title="Comodo ".clrs_detect_browser_version("Dragon");
		$code="comodo-dragon";
	}
	elseif(preg_match('/Conkeror/i', $useragent))
	{
		$link="http://www.conkeror.org/";
		$title=clrs_detect_browser_version("Conkeror");
		$code="conkeror";
	}
	elseif(preg_match('/CoolNovo/i', $useragent))
	{
		$link="http://www.coolnovo.com/";
		$title=clrs_detect_browser_version("CoolNovo");
		$code="coolnovo";
	}
	elseif(preg_match('/Crazy\ Browser/i', $useragent))
	{
		$link="http://www.crazybrowser.com/";
		$title="Crazy ".clrs_detect_browser_version("Browser");
		$code="crazybrowser";
	}
	elseif(preg_match('/CrMo/i', $useragent))
	{
		$link="http://www.google.com/chrome";
		$title=clrs_detect_browser_version("CrMo");
		$code="chrome";
	}
	elseif(preg_match('/Cruz/i', $useragent))
	{
		$link="http://www.cruzapp.com/";
		$title=clrs_detect_browser_version("Cruz");
		$code="cruz";
	}
	elseif(preg_match('/Cyberdog/i', $useragent))
	{
		$link="http://www.cyberdog.org/about/cyberdog/cyberbrowse.html";
		$title=clrs_detect_browser_version("Cyberdog");
		$code="cyberdog";
	}
	elseif(preg_match('/DPlus/i', $useragent))
	{
		$link="http://dplus-browser.sourceforge.net/";
		$title=clrs_detect_browser_version("DPlus");
		$code="dillo";
	}
	elseif(preg_match('/Deepnet\ Explorer/i', $useragent))
	{
		$link="http://www.deepnetexplorer.com/";
		$title=clrs_detect_browser_version("Deepnet Explorer");
		$code="deepnetexplorer";
	}
	elseif(preg_match('/Demeter/i', $useragent))
	{
		$link="http://www.hurrikenux.com/Demeter/";
		$title=clrs_detect_browser_version("Demeter");
		$code="demeter";
	}
	elseif(preg_match('/DeskBrowse/i', $useragent))
	{
		$link="http://www.deskbrowse.org/";
		$title=clrs_detect_browser_version("DeskBrowse");
		$code="deskbrowse";
	}
	elseif(preg_match('/Dillo/i', $useragent))
	{
		$link="http://www.dillo.org/";
		$title=clrs_detect_browser_version("Dillo");
		$code="dillo";
	}
	elseif(preg_match('/DoCoMo/i', $useragent))
	{
		$link="http://www.nttdocomo.com/";
		$title=clrs_detect_browser_version("DoCoMo");
		$code="null";
	}
	elseif(preg_match('/DocZilla/i', $useragent))
	{
		$link="http://www.doczilla.com/";
		$title=clrs_detect_browser_version("DocZilla");
		$code="doczilla";
	}
	elseif(preg_match('/Dolfin/i', $useragent))
	{
		$link="http://www.samsungmobile.com/";
		$title=clrs_detect_browser_version("Dolfin");
		$code="samsung";
	}
	elseif(preg_match('/Dooble/i', $useragent))
	{
		$link="http://dooble.sourceforge.net/";
		$title=clrs_detect_browser_version("Dooble");
		$code="dooble";
	}
	elseif(preg_match('/Doris/i', $useragent))
	{
		$link="http://www.anygraaf.fi/browser/indexe.htm";
		$title=clrs_detect_browser_version("Doris");
		$code="doris";
	}
	elseif(preg_match('/Dorothy/i', $useragent))
	{
		$link="http://www.dorothybrowser.com/";
		$title=clrs_detect_browser_version("Dorothy");
		$code="dorothybrowser";
	}
	elseif(preg_match('/Edbrowse/i', $useragent))
	{
		$link="http://edbrowse.sourceforge.net/";
		$title=clrs_detect_browser_version("Edbrowse");
		$code="edbrowse";
	}
	elseif(preg_match('/Elinks/i', $useragent))
	{
		$link="http://elinks.or.cz/";
		$title=clrs_detect_browser_version("Elinks");
		$code="elinks";
	}
	elseif(preg_match('/Element\ Browser/i', $useragent))
	{
		$link="http://www.elementsoftware.co.uk/software/elementbrowser/";
		$title="Element ".clrs_detect_browser_version("Browser");
		$code="elementbrowser";
	}
	elseif(preg_match('/Enigma\ Browser/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Enigma_Browser";
		$title="Enigma ".clrs_detect_browser_version("Browser");
		$code="enigmabrowser";
	}
	elseif(preg_match('/EnigmaFox/i', $useragent))
	{
		$link="#";
		$title=clrs_detect_browser_version("EnigmaFox");
		$code="null";
	}
	elseif(preg_match('/Epic/i', $useragent))
	{
		$link="http://www.epicbrowser.com/";
		$title=clrs_detect_browser_version("Epic");
		$code="epicbrowser";
	}
	elseif(preg_match('/Epiphany/i', $useragent))
	{
		$link="http://gnome.org/projects/epiphany/";
		$title=clrs_detect_browser_version("Epiphany");
		$code="epiphany";
	}
	elseif(preg_match('/Escape/i', $useragent))
	{
		$link="http://www.espial.com/products/evo_browser/";
		$title="Espial TV Browser - ".clrs_detect_browser_version("Escape");
		$code="espialtvbrowser";
	}
	elseif(preg_match('/Fennec/i', $useragent))
	{
		$link="https://wiki.mozilla.org/Fennec";
		$title=clrs_detect_browser_version("Fennec");
		$code="fennec";
	}
	elseif(preg_match('/Firebird/i', $useragent))
	{
		$link="http://seb.mozdev.org/firebird/";
		$title=clrs_detect_browser_version("Firebird");
		$code="firebird";
	}
	elseif(preg_match('/Fireweb\ Navigator/i', $useragent))
	{
		$link="http://www.arsslensoft.tk/?q=node/7";
		$title=clrs_detect_browser_version("Fireweb Navigator");
		$code="firewebnavigator";
	}
	elseif(preg_match('/Flock/i', $useragent))
	{
		$link="http://www.flock.com/";
		$title=clrs_detect_browser_version("Flock");
		$code="flock";
	}
	elseif(preg_match('/Fluid/i', $useragent))
	{
		$link="http://www.fluidapp.com/";
		$title=clrs_detect_browser_version("Fluid");
		$code="fluid";
	}
	elseif(preg_match('/Galaxy/i', $useragent)
		&& !preg_match('/Chrome/i', $useragent))
	{
		$link="http://www.traos.org/";
		$title=clrs_detect_browser_version("Galaxy");
		$code="galaxy";
	}
	elseif(preg_match('/Galeon/i', $useragent))
	{
		$link="http://galeon.sourceforge.net/";
		$title=clrs_detect_browser_version("Galeon");
		$code="galeon";
	}
	elseif(preg_match('/GlobalMojo/i', $useragent))
	{
		$link="http://www.globalmojo.com/";
		$title=clrs_detect_browser_version("GlobalMojo");
		$code="globalmojo";
	}
	elseif(preg_match('/GoBrowser/i', $useragent))
	{
		$link="http://www.gobrowser.cn/";
		$title="GO ".clrs_detect_browser_version("Browser");
		$code="gobrowser";
	}
	elseif(preg_match('/Google\ Wireless\ Transcoder/i', $useragent))
	{
		$link="http://google.com/gwt/n";
		$title="Google Wireless Transcoder";
		$code="google";
	}
	elseif(preg_match('/GoSurf/i', $useragent))
	{
		$link="http://gosurfbrowser.com/?ln=en";
		$title=clrs_detect_browser_version("GoSurf");
		$code="gosurf";
	}
	elseif(preg_match('/GranParadiso/i', $useragent))
	{
		$link="http://www.mozilla.org/";
		$title=clrs_detect_browser_version("GranParadiso");
		$code="firefoxdevpre";
	}
	elseif(preg_match('/GreenBrowser/i', $useragent))
	{
		$link="http://www.morequick.com/";
		$title=clrs_detect_browser_version("GreenBrowser");
		$code="greenbrowser";
	}
	elseif(preg_match('/Hana/i', $useragent))
	{
		$link="http://www.alloutsoftware.com/";
		$title=clrs_detect_browser_version("Hana");
		$code="hana";
	}
	elseif(preg_match('/HotJava/i', $useragent))
	{
		$link="http://java.sun.com/products/archive/hotjava/";
		$title=clrs_detect_browser_version("HotJava");
		$code="hotjava";
	}
	elseif(preg_match('/Hv3/i', $useragent))
	{
		$link="http://tkhtml.tcl.tk/hv3.html";
		$title=clrs_detect_browser_version("Hv3");
		$code="hv3";
	}
	elseif(preg_match('/Hydra\ Browser/i', $useragent))
	{
		$link="http://www.hydrabrowser.com/";
		$title="Hydra Browser";
		$code="hydrabrowser";
	}
	elseif(preg_match('/Iris/i', $useragent))
	{
		$link="http://www.torchmobile.com/";
		$title=clrs_detect_browser_version("Iris");
		$code="iris";
	}
	elseif(preg_match('/IBM\ WebExplorer/i', $useragent))
	{
		$link="http://www.networking.ibm.com/WebExplorer/";
		$title="IBM ".clrs_detect_browser_version("WebExplorer");
		$code="ibmwebexplorer";
	}
	elseif(preg_match('/IBrowse/i', $useragent))
	{
		$link="http://www.ibrowse-dev.net/";
		$title=clrs_detect_browser_version("IBrowse");
		$code="ibrowse";
	}
	elseif(preg_match('/iCab/i', $useragent))
	{
		$link="http://www.icab.de/";
		$title=clrs_detect_browser_version("iCab");
		$code="icab";
	}
	elseif(preg_match('/Ice Browser/i', $useragent))
	{
		$link="http://www.icesoft.com/products/icebrowser.html";
		$title=clrs_detect_browser_version("Ice Browser");
		$code="icebrowser";
	}
	elseif(preg_match('/Iceape/i', $useragent))
	{
		$link="http://packages.debian.org/iceape";
		$title=clrs_detect_browser_version("Iceape");
		$code="iceape";
	}
	elseif(preg_match('/IceCat/i', $useragent))
	{
		$link="http://gnuzilla.gnu.org/";
		$title="GNU ".clrs_detect_browser_version("IceCat");
		$code="icecat";
	}
	elseif(preg_match('/IceWeasel/i', $useragent))
	{
		$link="http://www.geticeweasel.org/";
		$title=clrs_detect_browser_version("IceWeasel");
		$code="iceweasel";
	}
	elseif(preg_match('/IEMobile/i', $useragent))
	{
		$link="http://www.microsoft.com/windowsmobile/en-us/downloads/microsoft/internet-explorer-mobile.mspx";
		$title=clrs_detect_browser_version("IEMobile");
		$code="msie-mobile";
	}
	elseif(preg_match('/iNet\ Browser/i', $useragent))
	{
		$link="http://alexanderjbeston.wordpress.com/";
		$title="iNet ".clrs_detect_browser_version("Browser");
		$code="null";
	}
	elseif(preg_match('/iRider/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/IRider";
		$title=clrs_detect_browser_version("iRider");
		$code="irider";
	}
	elseif(preg_match('/Iron/i', $useragent))
	{
		$link="http://www.srware.net/en/software_srware_iron.php";
		$title=clrs_detect_browser_version("Iron");
		$code="iron";
	}
	elseif(preg_match('/InternetSurfboard/i', $useragent))
	{
		$link="http://inetsurfboard.sourceforge.net/";
		$title=clrs_detect_browser_version("InternetSurfboard");
		$code="internetsurfboard";
	}
	elseif(preg_match('/Jasmine/i', $useragent))
	{
		$link="http://www.samsungmobile.com/";
		$title=clrs_detect_browser_version("Jasmine");
		$code="samsung";
	}
	elseif(preg_match('/K-Meleon/i', $useragent))
	{
		$link="http://kmeleon.sourceforge.net/";
		$title=clrs_detect_browser_version("K-Meleon");
		$code="kmeleon";
	}
	elseif(preg_match('/K-Ninja/i', $useragent))
	{
		$link="http://k-ninja-samurai.en.softonic.com/";
		$title=clrs_detect_browser_version("K-Ninja");
		$code="kninja";
	}
	elseif(preg_match('/Kapiko/i', $useragent))
	{
		$link="http://ufoxlab.googlepages.com/cooperation";
		$title=clrs_detect_browser_version("Kapiko");
		$code="kapiko";
	}
	elseif(preg_match('/Kazehakase/i', $useragent))
	{
		$link="http://kazehakase.sourceforge.jp/";
		$title=clrs_detect_browser_version("Kazehakase");
		$code="kazehakase";
	}
	elseif(preg_match('/Strata/i', $useragent))
	{
		$link="http://www.kirix.com/";
		$title="Kirix ".clrs_detect_browser_version("Strata");
		$code="kirix-strata";
	}
	elseif(preg_match('/KKman/i', $useragent))
	{
		$link="http://www.kkman.com.tw/";
		$title=clrs_detect_browser_version("KKman");
		$code="kkman";
	}
	elseif(preg_match('/KMail/i', $useragent))
	{
		$link="http://kontact.kde.org/kmail/";
		$title=clrs_detect_browser_version("KMail");
		$code="kmail";
	}
	elseif(preg_match('/KMLite/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/K-Meleon";
		$title=clrs_detect_browser_version("KMLite");
		$code="kmeleon";
	}
	elseif(preg_match('/Konqueror/i', $useragent))
	{
		$link="http://konqueror.kde.org/";
		$title=clrs_detect_browser_version("Konqueror");
		$code="konqueror";
	}
	elseif(preg_match('/Kylo/i', $useragent))
	{
		$link="http://kylo.tv/";
		$title=clrs_detect_browser_version("Kylo");
		$code="kylo";
	}
	elseif(preg_match('/LBrowser/i', $useragent))
	{
		$link="http://wiki.freespire.org/index.php/Web_Browser";
		$title=clrs_detect_browser_version("LBrowser");
		$code="lbrowser";
	}
	elseif(preg_match('/LeechCraft/i', $useragent))
	{
		$link="http://leechcraft.org/";
		$title="LeechCraft";
		$code="null";
	}
	elseif(preg_match('/Links/i', $useragent)
		&& !preg_match('/online\ link\ validator/i', $useragent))
	{
		$link="http://links.sourceforge.net/";
		$title=clrs_detect_browser_version("Links");
		$code="links";
	}
	elseif(preg_match('/Lobo/i', $useragent))
	{
		$link="http://www.lobobrowser.org/";
		$title=clrs_detect_browser_version("Lobo");
		$code="lobo";
	}
	elseif(preg_match('/lolifox/i', $useragent))
	{
		$link="http://www.lolifox.com/";
		$title=clrs_detect_browser_version("lolifox");
		$code="lolifox";
	}
	elseif(preg_match('/Lorentz/i', $useragent))
	{
		$link="http://news.softpedia.com/news/Firefox-Codenamed-Lorentz-Drops-in-March-2010-130855.shtml";
		$title=clrs_detect_browser_version("Lorentz");
		$code="firefoxdevpre";
	}
	elseif(preg_match('/Lunascape/i', $useragent))
	{
		$link="http://www.lunascape.tv";
		$title=clrs_detect_browser_version("Lunascape");
		$code="lunascape";
	}
	elseif(preg_match('/Lynx/i', $useragent))
	{
		$link="http://lynx.browser.org/";
		$title=clrs_detect_browser_version("Lynx");
		$code="lynx";
	}
	elseif(preg_match('/Madfox/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Madfox";
		$title=clrs_detect_browser_version("Madfox");
		$code="madfox";
	}
	elseif(preg_match('/Maemo\ Browser/i', $useragent))
	{
		$link="http://maemo.nokia.com/features/maemo-browser/";
		$title=clrs_detect_browser_version("Maemo Browser");
		$code="maemo";
	}
	elseif(preg_match('/Maxthon/i', $useragent))
	{
		$link="http://www.maxthon.com/";
		$title=clrs_detect_browser_version("Maxthon");
		$code="maxthon";
	}
	elseif(preg_match('/\ MIB\//i', $useragent))
	{
		$link="http://www.motorola.com/content.jsp?globalObjectId=1827-4343";
		$title=clrs_detect_browser_version("MIB");
		$code="mib";
	}
	elseif(preg_match('/Tablet\ browser/i', $useragent))
	{
		$link="http://browser.garage.maemo.org/";
		$title=clrs_detect_browser_version("Tablet browser");
		$code="microb";
	}
	elseif(preg_match('/Midori/i', $useragent))
	{
		$link="http://www.twotoasts.de/index.php?/pages/midori_summary.html";
		$title=clrs_detect_browser_version("Midori");
		$code="midori";
	}
	elseif(preg_match('/Minefield/i', $useragent))
	{
		$link="http://www.mozilla.org/projects/minefield/";
		$title=clrs_detect_browser_version("Minefield");
		$code="minefield";
	}
	elseif(preg_match('/MiniBrowser/i', $useragent))
	{
		$link="http://dmkho.tripod.com/";
		$title=clrs_detect_browser_version("MiniBrowser");
		$code="minibrowser";
	}
	elseif(preg_match('/Minimo/i', $useragent))
	{
		$link="http://www-archive.mozilla.org/projects/minimo/";
		$title=clrs_detect_browser_version("Minimo");
		$code="minimo";
	}
	elseif(preg_match('/Mosaic/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Mosaic_(web_browser)";
		$title=clrs_detect_browser_version("Mosaic");
		$code="mosaic";
	}
	elseif(preg_match('/MozillaDeveloperPreview/i', $useragent))
	{
		$link="http://www.mozilla.org/projects/devpreview/releasenotes/";
		$title=clrs_detect_browser_version("MozillaDeveloperPreview");
		$code="firefoxdevpre";
	}
	elseif(preg_match('/MQQBrowser/i', $useragent))
	{
		$link="http://browser.qq.com/";
		$title="QQbrowser";
		$code="qqbrowser";
	}
	elseif(preg_match('/Multi-Browser/i', $useragent))
	{
		$link="http://www.multibrowser.de/";
		$title=clrs_detect_browser_version("Multi-Browser");
		$code="multi-browserxp";
	}
	elseif(preg_match('/MultiZilla/i', $useragent))
	{
		$link="http://multizilla.mozdev.org/";
		$title=clrs_detect_browser_version("MultiZilla");
		$code="mozilla";
	}
	elseif(preg_match('/myibrow/i', $useragent)
		&& preg_match('/My\ Internet\ Browser/i', $useragent))
	{
		$link="http://myinternetbrowser.webove-stranky.org/";
		$title=clrs_detect_browser_version("myibrow");
		$code="my-internet-browser";
	}
	elseif(preg_match('/MyIE2/i', $useragent))
	{
		$link="http://www.myie2.com/";
		$title=clrs_detect_browser_version("MyIE2");
		$code="myie2";
	}
	elseif(preg_match('/Namoroka/i', $useragent))
	{
		$link="https://wiki.mozilla.org/Firefox/Namoroka";
		$title=clrs_detect_browser_version("Namoroka");
		$code="firefoxdevpre";
	}
	elseif(preg_match('/Navigator/i', $useragent))
	{
		$link="http://netscape.aol.com/";
		$title="Netscape ".clrs_detect_browser_version("Navigator");
		$code="netscape";
	}
	elseif(preg_match('/NetBox/i', $useragent))
	{
		$link="http://www.netgem.com/";
		$title=clrs_detect_browser_version("NetBox");
		$code="netbox";
	}
	elseif(preg_match('/NetCaptor/i', $useragent))
	{
		$link="http://www.netcaptor.com/";
		$title=clrs_detect_browser_version("NetCaptor");
		$code="netcaptor";
	}
	elseif(preg_match('/NetFront/i', $useragent))
	{
		$link="http://www.access-company.com/";
		$title=clrs_detect_browser_version("NetFront");
		$code="netfront";
	}
	elseif(preg_match('/NetNewsWire/i', $useragent))
	{
		$link="http://www.newsgator.com/individuals/netnewswire/";
		$title=clrs_detect_browser_version("NetNewsWire");
		$code="netnewswire";
	}
	elseif(preg_match('/NetPositive/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/NetPositive";
		$title=clrs_detect_browser_version("NetPositive");
		$code="netpositive";
	}
	elseif(preg_match('/Netscape/i', $useragent))
	{
		$link="http://netscape.aol.com/";
		$title=clrs_detect_browser_version("Netscape");
		$code="netscape";
	}
	elseif(preg_match('/NetSurf/i', $useragent))
	{
		$link="http://www.netsurf-browser.org/";
		$title=clrs_detect_browser_version("NetSurf");
		$code="netsurf";
	}
	elseif(preg_match('/NF-Browser/i', $useragent))
	{
		$link="http://www.access-company.com/";
		$title=clrs_detect_browser_version("NF-Browser");
		$code="netfront";
	}
	elseif(preg_match('/NintendoBrowser/i', $useragent))
	{
		$link="http://www.netsurf-browser.org/";
		$title="Nintendo ".clrs_detect_browser_version("Browser");
		$code="nintendobrowser";
	}
	elseif(preg_match('/NokiaBrowser/i', $useragent))
	{
		$link="http://browser.nokia.com/";
		$title="Nokia ".clrs_detect_browser_version("Browser");
		$code="nokia";
	}
	elseif(preg_match('/Novarra-Vision/i', $useragent))
	{
		$link="http://www.novarra.com/";
		$title="Novarra ".clrs_detect_browser_version("Vision");
		$code="novarra";
	}
	elseif(preg_match('/Obigo/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Obigo_Browser";
		$title=clrs_detect_browser_version("Obigo");
		$code="obigo";
	}
	elseif(preg_match('/OffByOne/i', $useragent))
	{
		$link="http://www.offbyone.com/";
		$title="Off By One";
		$code="offbyone";
	}
	elseif(preg_match('/OmniWeb/i', $useragent))
	{
		$link="http://www.omnigroup.com/applications/omniweb/";
		$title=clrs_detect_browser_version("OmniWeb");
		$code="omniweb";
	}
	elseif(preg_match('/Opera Mini/i', $useragent))
	{
		$link="http://www.opera.com/mini/";
		$title=clrs_detect_browser_version("Opera Mini");
		$code="opera-2";
	}
	elseif(preg_match('/Opera Mobi/i', $useragent))
	{
		$link="http://www.opera.com/mobile/";
		$title=clrs_detect_browser_version("Opera Mobi");
		$code="opera-2";
	}
	elseif(preg_match('/Opera Labs/i', $useragent)
		|| (preg_match('/Opera/i', $useragent)
			&& preg_match('/Edition Labs/i', $useragent)))
	{
		$link="http://labs.opera.com/";
		$title=clrs_detect_browser_version("Opera Labs");
		$code="opera-next";
	}
	elseif(preg_match('/Opera Next/i', $useragent)
		|| (preg_match('/Opera/i', $useragent)
			&& preg_match('/Edition Next/i', $useragent)))
	{
		$link="http://www.opera.com/support/kb/view/991/";
		$title=clrs_detect_browser_version("Opera Next");
		$code="opera-next";
	}
	elseif(preg_match('/Opera/i', $useragent))
	{
		$link="http://www.opera.com/";
		$title=clrs_detect_browser_version("Opera");
		$code="opera-1";
		if(preg_match('/Version/i', $useragent))
			$code="opera-2";
	}
	elseif(preg_match('/Orca/i', $useragent))
	{
		$link="http://www.orcabrowser.com/";
		$title=clrs_detect_browser_version("Orca");
		$code="orca";
	}
	elseif(preg_match('/Oregano/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Oregano_(web_browser)";
		$title=clrs_detect_browser_version("Oregano");
		$code="oregano";
	}
	elseif(preg_match('/Origyn\ Web\ Browser/i', $useragent))
	{
		$link="http://www.sand-labs.org/owb";
		$title="Oregano Web Browser";
		$code="owb";
	}
	elseif(preg_match('/osb-browser/i', $useragent))
	{
		$link="http://gtk-webcore.sourceforge.net/";
		$title=clrs_detect_browser_version("osb-browser");
		$code="null";
	}
	elseif(preg_match('/\ Pre\//i', $useragent))
	{
		$link="http://www.palm.com/us/products/phones/pre/index.html";
		$title="Palm ".clrs_detect_browser_version("Pre");
		$code="palmpre";
	}
	elseif(preg_match('/Palemoon/i', $useragent))
	{
		$link="http://www.palemoon.org/";
		$title="Pale ".clrs_detect_browser_version("Moon");
		$code="palemoon";
	}
	elseif(preg_match('/Patriott\:\:Browser/i', $useragent))
	{
		$link="http://madgroup.x10.mx/patriott1.php";
		$title="Patriott ".clrs_detect_browser_version("Browser");
		$code="patriott";
	}
	elseif(preg_match('/Phaseout/i', $useragent))
	{
		$link="http://www.phaseout.net/";
		$title="Phaseout";
		$code="phaseout";
	}
	elseif(preg_match('/Phoenix/i', $useragent))
	{
		$link="http://www.mozilla.org/projects/phoenix/phoenix-release-notes.html";
		$title=clrs_detect_browser_version("Phoenix");
		$code="phoenix";
	}
	elseif(preg_match('/Podkicker/i', $useragent))
	{
		$link="http://www.podkicker.com/";
		$title=clrs_detect_browser_version("Podkicker");
		$code="podkicker";
	}
	elseif(preg_match('/Podkicker\ Pro/i', $useragent))
	{
		$link="http://www.podkicker.com/";
		$title=clrs_detect_browser_version("Podkicker Pro");
		$code="podkicker";
	}
	elseif(preg_match('/Pogo/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/AT%26T_Pogo";
		$title=clrs_detect_browser_version("Pogo");
		$code="pogo";
	}
	elseif(preg_match('/Polaris/i', $useragent))
	{
		$link="http://www.infraware.co.kr/eng/01_product/product02.asp";
		$title=clrs_detect_browser_version("Polaris");
		$code="polaris";
	}
	elseif(preg_match('/Prism/i', $useragent))
	{
		$link="http://prism.mozillalabs.com/";
		$title=clrs_detect_browser_version("Prism");
		$code="prism";
	}
	elseif(preg_match('/QtWeb\ Internet\ Browser/i', $useragent))
	{
		$link="http://www.qtweb.net/";
		$title="QtWeb Internet ".clrs_detect_browser_version("Browser");
		$code="qtwebinternetbrowser";
	}
	elseif(preg_match('/QupZilla/i', $useragent))
	{
		$link="http://www.qupzilla.com/";
		$title=clrs_detect_browser_version("QupZilla");
		$code="qupzilla";
	}
	elseif(preg_match('/rekonq/i', $useragent))
	{
		$link="http://rekonq.sourceforge.net/";
		$title="rekonq";
		$code="rekonq";
	}
	elseif(preg_match('/retawq/i', $useragent))
	{
		$link="http://retawq.sourceforge.net/";
		$title=clrs_detect_browser_version("retawq");
		$code="terminal";
	}
	elseif(preg_match('/RockMelt/i', $useragent))
	{
		$link="http://www.rockmelt.com/";
		$title=clrs_detect_browser_version("RockMelt");
		$code="rockmelt";
	}
	elseif(preg_match('/Ryouko/i', $useragent))
	{
		$link="http://sourceforge.net/projects/ryouko/";
		$title=clrs_detect_browser_version("Ryouko");
		$code="ryouko";
	}
	elseif(preg_match('/SaaYaa/i', $useragent))
	{
		$link="http://www.saayaa.com/";
		$title="SaaYaa Explorer";
		$code="saayaa";
	}
	elseif(preg_match('/SeaMonkey/i', $useragent))
	{
		$link="http://www.seamonkey-project.org/";
		$title=clrs_detect_browser_version("SeaMonkey");
		$code="seamonkey";
	}
	elseif(preg_match('/SEMC-Browser/i', $useragent))
	{
		$link="http://www.sonyericsson.com/";
		$title=clrs_detect_browser_version("SEMC-Browser");
		$code="semcbrowser";
	}
	elseif(preg_match('/SEMC-java/i', $useragent))
	{
		$link="http://www.sonyericsson.com/";
		$title=clrs_detect_browser_version("SEMC-java");
		$code="semcbrowser";
	}
	elseif(preg_match('/Series60/i', $useragent)
		&& !preg_match('/Symbian/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Web_Browser_for_S60";
		$title="Nokia ".clrs_detect_browser_version("Series60");
		$code="s60";
	}
	elseif(preg_match('/S60/i', $useragent)
		&& !preg_match('/Symbian/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Web_Browser_for_S60";
		$title="Nokia ".clrs_detect_browser_version("S60");
		$code="s60";
	}
	elseif(preg_match('/SE\ /i', $useragent)
		&& preg_match('/MetaSr/i', $useragent))
	{
		$link="http://ie.sogou.com/";
		$title="Sogou Explorer";
		$code="sogou";
	}
	elseif(preg_match('/Shiira/i', $useragent))
	{
		$link="http://www.shiira.jp/en.php";
		$title=clrs_detect_browser_version("Shiira");
		$code="shiira";
	}
	elseif(preg_match('/Shiretoko/i', $useragent))
	{
		$link="http://www.mozilla.org/";
		$title=clrs_detect_browser_version("Shiretoko");
		$code="firefoxdevpre";
	}
	elseif(preg_match('/Silk/i', $useragent)
		&& !preg_match('/PlayStation/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Amazon_Silk";
		$title="Amazon ".clrs_detect_browser_version("Silk");
		$code="silk";
	}
	elseif(preg_match('/SiteKiosk/i', $useragent))
	{
		$link="http://www.sitekiosk.com/SiteKiosk/Default.aspx";
		$title=clrs_detect_browser_version("SiteKiosk");
		$code="sitekiosk";
	}
	elseif(preg_match('/SkipStone/i', $useragent))
	{
		$link="http://www.muhri.net/skipstone/";
		$title=clrs_detect_browser_version("SkipStone");
		$code="skipstone";
	}
	elseif(preg_match('/Skyfire/i', $useragent))
	{
		$link="http://www.skyfire.com/";
		$title=clrs_detect_browser_version("Skyfire");
		$code="skyfire";
	}
	elseif(preg_match('/Sleipnir/i', $useragent))
	{
		$link="http://www.fenrir-inc.com/other/sleipnir/";
		$title=clrs_detect_browser_version("Sleipnir");
		$code="sleipnir";
	}
	elseif(preg_match('/SlimBoat/i', $useragent))
	{
		$link="http://slimboat.com/";
		$title=clrs_detect_browser_version("SlimBoat");
		$code="slimboat";
	}
	elseif(preg_match('/SlimBrowser/i', $useragent))
	{
		$link="http://www.flashpeak.com/sbrowser/";
		$title=clrs_detect_browser_version("SlimBrowser");
		$code="slimbrowser";
	}
	elseif(preg_match('/SmartTV/i', $useragent))
	{
		$link="http://www.freethetvchallenge.com/details/faq";
		$title=clrs_detect_browser_version("SmartTV");
		$code="maplebrowser";
	}
	elseif(preg_match('/Songbird/i', $useragent))
	{
		$link="http://www.getsongbird.com/";
		$title=clrs_detect_browser_version("Songbird");
		$code="songbird";
	}
	elseif(preg_match('/Stainless/i', $useragent))
	{
		$link="http://www.stainlessapp.com/";
		$title=clrs_detect_browser_version("Stainless");
		$code="stainless";
	}
	elseif(preg_match('/SubStream/i', $useragent))
	{
		$link="http://itunes.apple.com/us/app/substream/id389906706?mt=8";
		$title=clrs_detect_browser_version("SubStream");
		$code="substream";
	}
	elseif(preg_match('/Sulfur/i', $useragent))
	{
		$link="http://www.flock.com/";
		$title="Flock ".clrs_detect_browser_version("Sulfur");
		$code="flock";
	}
	elseif(preg_match('/Sundance/i', $useragent))
	{
		$link="http://digola.com/sundance.html";
		$title=clrs_detect_browser_version("Sundance");
		$code="sundance";
	}
	elseif(preg_match('/Sunrise/i', $useragent))
	{
		$link="http://www.sundialbrowser.com/";
		$title=clrs_detect_browser_version("Sundial");
		$code="sundial";
	}
	elseif(preg_match('/Sunrise/i', $useragent))
	{
		$link="http://www.sunrisebrowser.com/";
		$title=clrs_detect_browser_version("Sunrise");
		$code="sunrise";
	}
	elseif(preg_match('/Surf/i', $useragent))
	{
		$link="http://surf.suckless.org/";
		$title=clrs_detect_browser_version("Surf");
		$code="surf";
	}
	elseif(preg_match('/Swiftfox/i', $useragent))
	{
		$link="http://www.getswiftfox.com/";
		$title=clrs_detect_browser_version("Swiftfox");
		$code="swiftfox";
	}
	elseif(preg_match('/Swiftweasel/i', $useragent))
	{
		$link="http://swiftweasel.tuxfamily.org/";
		$title=clrs_detect_browser_version("Swiftweasel");
		$code="swiftweasel";
	}
	elseif(preg_match('/Sylera/i', $useragent))
	{
		$link="http://dombla.net/sylera/";
		$title=clrs_detect_browser_version("Sylera");
		$code="null";
	}
	elseif(preg_match('/tear/i', $useragent))
	{
		$link="http://wiki.maemo.org/Tear";
		$title="Tear";
		$code="tear";
	}
	elseif(preg_match('/TeaShark/i', $useragent))
	{
		$link="http://www.teashark.com/";
		$title=clrs_detect_browser_version("TeaShark");
		$code="teashark";
	}
	elseif(preg_match('/Teleca/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/Obigo_Browser/";
		$title=clrs_detect_browser_version(" Teleca");
		$code="obigo";
	}
	elseif(preg_match('/TencentTraveler/i', $useragent))
	{
		$link="http://www.tencent.com/en-us/index.shtml";
		$title="Tencent ".clrs_detect_browser_version("Traveler");
		$code="tencenttraveler";
	}
	elseif(preg_match('/TenFourFox/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/TenFourFox";
		$title=clrs_detect_browser_version("TenFourFox");
		$code="tenfourfox";
	}
	elseif(preg_match('/TheWorld/i', $useragent))
	{
		$link="http://www.ioage.com/";
		$title="TheWorld Browser";
		$code="theworld";
	}
	elseif(preg_match('/Thunderbird/i', $useragent))
	{
		$link="http://www.mozilla.com/thunderbird/";
		$title=clrs_detect_browser_version("Thunderbird");
		$code="thunderbird";
	}
	elseif(preg_match('/Tizen/i', $useragent))
	{
		$link="https://www.tizen.org/";
		$title=clrs_detect_browser_version("Tizen");
		$code="tizen";
	}
	elseif(preg_match('/Tjusig/i', $useragent))
	{
		$link="http://www.tjusig.cz/";
		$title=clrs_detect_browser_version("Tjusig");
		$code="tjusig";
	}
	elseif(preg_match('/TencentTraveler/i', $useragent))
	{
		$link="http://tt.qq.com/";
		$title=clrs_detect_browser_version("TencentTraveler");
		$code="tt-explorer";
	}
	elseif(preg_match('/uBrowser/i', $useragent))
	{
		$link="http://www.ubrowser.com/";
		$title=clrs_detect_browser_version("uBrowser");
		$code="ubrowser";
	}
	elseif(preg_match('/UC\ Browser/i', $useragent))
	{
		$link="http://www.uc.cn/English/index.shtml";
		$title=clrs_detect_browser_version("UC Browser");
		$code="ucbrowser";
	}
	elseif(preg_match('/UCWEB/i', $useragent))
	{
		$link="http://www.ucweb.com/English/product.shtml";
		$title=clrs_detect_browser_version("UCWEB");
		$code="ucweb";
	}
	elseif(preg_match('/UltraBrowser/i', $useragent))
	{
		$link="http://www.ultrabrowser.com/";
		$title=clrs_detect_browser_version("UltraBrowser");
		$code="ultrabrowser";
	}
	elseif(preg_match('/UP.Browser/i', $useragent))
	{
		$link="http://www.openwave.com/";
		$title=clrs_detect_browser_version("UP.Browser");
		$code="openwave";
	}
	elseif(preg_match('/UP.Link/i', $useragent))
	{
		$link="http://www.openwave.com/";
		$title=clrs_detect_browser_version("UP.Link");
		$code="openwave";
	}
	elseif(preg_match('/Usejump/i', $useragent))
	{
		$link="http://www.usejump.com/";
		$title=clrs_detect_browser_version("Usejump");
		$code="usejump";
	}
	elseif(preg_match('/uZardWeb/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/UZard_Web";
		$title=clrs_detect_browser_version("uZardWeb");
		$code="uzardweb";
	}
	elseif(preg_match('/uZard/i', $useragent))
	{
		$link="http://en.wikipedia.org/wiki/UZard_Web";
		$title=clrs_detect_browser_version("uZard");
		$code="uzardweb";
	}
	elseif(preg_match('/uzbl/i', $useragent))
	{
		$link="http://www.uzbl.org/";
		$title="uzbl";
		$code="uzbl";
	}
	elseif(preg_match('/Vimprobable/i', $useragent))
	{
		$link="http://www.vimprobable.org/";
		$title=clrs_detect_browser_version("Vimprobable");
		$code="null";
	}
	elseif(preg_match('/Vonkeror/i', $useragent))
	{
		$link="http://zzo38computer.cjb.net/vonkeror/";
		$title=clrs_detect_browser_version("Vonkeror");
		$code="null";
	}
	elseif(preg_match('/w3m/i', $useragent))
	{
		$link="http://w3m.sourceforge.net/";
		$title=clrs_detect_browser_version("W3M");
		$code="w3m";
	}
	elseif(preg_match('/AppleWebkit/i', $useragent)
		&& preg_match('/Android/i', $useragent)
		&& !preg_match('/Chrome/i', $useragent))
	{
		$link="http://developer.android.com/reference/android/webkit/package-summary.html";
		$title=clrs_detect_browser_version("Android Webkit");
		$code="android-webkit";
	}
	elseif(preg_match('/WebianShell/i', $useragent))
	{
		$link="http://webian.org/shell/";
		$title="Webian ".clrs_detect_browser_version("Shell");
		$code="webianshell";
	}
	elseif(preg_match('/Webrender/i', $useragent))
	{
		$link="http://webrender.99k.org/";
		$title="Webrender";
		$code="webrender";
	}
	elseif(preg_match('/WeltweitimnetzBrowser/i', $useragent))
	{
		$link="http://weltweitimnetz.de/software/Browser.en.page";
		$title="Weltweitimnetz ".clrs_detect_browser_version("Browser");
		$code="weltweitimnetzbrowser";
	}
	elseif(preg_match('/wKiosk/i', $useragent))
	{
		$link="http://www.app4mac.com/store/index.php?target=products&product_id=9";
		$title="wKiosk";
		$code="wkiosk";
	}
	elseif(preg_match('/WorldWideWeb/i', $useragent))
	{
		$link="http://www.w3.org/People/Berners-Lee/WorldWideWeb.html";
		$title=clrs_detect_browser_version("WorldWideWeb");
		$code="worldwideweb";
	}
	elseif(preg_match('/wp-android/i', $useragent))
	{
		$link="http://android.wordpress.org/";
		$title=clrs_detect_browser_version("wp-android");
		$code="wordpress";
	}
	elseif(preg_match('/wp-blackberry/i', $useragent))
	{
		$link="http://blackberry.wordpress.org/";
		$title=clrs_detect_browser_version("wp-blackberry");
		$code="wordpress";
	}
	elseif(preg_match('/wp-iphone/i', $useragent))
	{
		$link="http://ios.wordpress.org/";
		$title=clrs_detect_browser_version("wp-iphone");
		$code="wordpress";
	}
	elseif(preg_match('/wp-nokia/i', $useragent))
	{
		$link="http://nokia.wordpress.org/";
		$title=clrs_detect_browser_version("wp-nokia");
		$code="wordpress";
	}
	elseif(preg_match('/wp-webos/i', $useragent))
	{
		$link="http://webos.wordpress.org/";
		$title=clrs_detect_browser_version("wp-webos");
		$code="wordpress";
	}
	elseif(preg_match('/wp-windowsphone/i', $useragent))
	{
		$link="http://windowsphone.wordpress.org/";
		$title=clrs_detect_browser_version("wp-windowsphone");
		$code="wordpress";
	}
	elseif(preg_match('/Wyzo/i', $useragent))
	{
		$link="http://www.wyzo.com/";
		$title=clrs_detect_browser_version("Wyzo");
		$code="Wyzo";
	}
	elseif(preg_match('/X-Smiles/i', $useragent))
	{
		$link="http://www.xsmiles.org/";
		$title=clrs_detect_browser_version("X-Smiles");
		$code="x-smiles";
	}
	elseif(preg_match('/Xiino/i', $useragent))
	{
		$link="#";
		$title=clrs_detect_browser_version("Xiino");
		$code="null";
	}
	elseif(preg_match('/YaBrowser/i', $useragent))
	{
		$link="http://browser.yandex.com/";
		$title="Yandex.".clrs_detect_browser_version("Browser");
		$code="yandex";
	}
	elseif(preg_match('/zBrowser/i', $useragent))
	{
		$link="http://sites.google.com/site/zeromusparadoxe01/zbrowser";
		$title=clrs_detect_browser_version("zBrowser");
		$code="zbrowser";
	}
	elseif(preg_match('/ZipZap/i', $useragent))
	{
		$link="http://www.zipzaphome.com/";
		$title=clrs_detect_browser_version("ZipZap");
		$code="zipzap";
	}

	// Pulled out of order to help ensure better detection for above browsers
	elseif(preg_match('/ABrowse/i', $useragent))
	{
		$link="http://abrowse.sourceforge.net/";
		$title=clrs_detect_browser_version("ABrowse");
		$code="abrowse";
	}
	elseif(preg_match('/Chrome/i', $useragent))
	{
		$link="http://google.com/chrome/";
		$title="Google ".clrs_detect_browser_version("Chrome");
		$code="chrome";
	}
	elseif(preg_match('/Safari/i', $useragent)
		&& !preg_match('/Nokia/i', $useragent))
	{
		$link="http://www.apple.com/safari/";
		$title="Safari";

		if(preg_match('/Version/i', $useragent))
		{
			$title=clrs_detect_browser_version("Safari");
		}
		
		if(preg_match('/Mobile Safari/i', $useragent))
		{
			$title="Mobile ".$title;
		}

		$code="safari";
	}
	elseif(preg_match('/Nokia/i', $useragent))
	{
		$link="http://www.nokia.com/browser";
		$title="Nokia Web Browser";
		$code="maemo"; 
	}
	elseif(preg_match('/Firefox/i', $useragent))
	{
		$link="http://www.mozilla.org/";
		$title=clrs_detect_browser_version("Firefox");
		$code="firefox";
	}
	elseif(preg_match('/MSIE/i', $useragent))
	{
		$link="http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
		$title="Internet Explorer".clrs_detect_browser_version("MSIE");
		
		preg_match('/MSIE[\ |\/]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch);

		if($regmatch[1]>=10)
		{
			$code="msie10";
		}
		elseif($regmatch[1]>=9)
		{
			$code="msie9";
		}
		elseif($regmatch[1]>=7)
		{
			// also ie8
			$code="msie7";
		}
		elseif($regmatch[1]>=6)
		{
			$code="msie6";
		}
		elseif($regmatch[1]>=4)
		{
			// also ie5
			$code="msie4";
		}
		elseif($regmatch[1]>=3)
		{
			$code="msie3";
		}
		elseif($regmatch[1]>=2)
		{
			$code="msie2";
		}
		elseif($regmatch[1]>=1)
		{
			$code="msie1";
		}
		else
		{
			$code="msie";
		}
	}
	elseif(preg_match('/Mozilla/i', $useragent))
	{
		if(preg_match('/rv:(11.0)/i', $useragent, $regmatch))
		{
		$link="http://www.microsoft.com/windows/products/winfamily/ie/default.mspx";
			$title="Internet Explorer 11.0";
			$code="msie10";
		}
		elseif(preg_match('/rv:([^11]...)/i', $useragent, $regmatch))
		{
		$link="http://www.mozilla.org/";
		$title="Mozilla ".$regmatch[1];
		$code="mozilla";
		}
	}
	else
	{
		$link="#";
		$title="Unknown";
		$code="null";

		if($ua_hide_unknown_bool=='true'
			&& $ua_show_text==2)
		{
			return $title;
		}
	}

	// How should we display this?
	//image and text
	$web_browser=clrs_img($code, "/net/", $title)."<span class='cmt_ua_n'>".$title."</span>";
	return $web_browser;
}

// Detect Web Browser versions
function clrs_detect_browser_version($title)
{
	global $useragent;

	// Fix for Opera's UA string changes in v10.00+ (and others)
	$start=$title;
	if( (strtolower($title)==strtolower("Opera")
			|| strtolower($title)==strtolower("Opera Next") 
			|| strtolower($title)==strtolower("Opera Labs"))
		&& preg_match('/Version/i', $useragent))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Opera Mobi")
		&& preg_match('/Version/i', $useragent))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Safari")
		&& preg_match('/Version/i', $useragent))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Pre")
		&& preg_match('/Version/i', $useragent))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Android Webkit"))
	{
		$start="Version";
	}
	elseif(strtolower($title)==strtolower("Links"))
	{
		$start="Links (";
	}
	elseif(strtolower($title)==strtolower("UC Browser"))
	{
		$start="UC Browse";
	}
	elseif(strtolower($title)==strtolower("TenFourFox"))
	{
		$start=" rv";
	}
	elseif(strtolower($title)==strtolower("Classilla"))
	{
		$start=" rv";
	}
	elseif(strtolower($title)==strtolower("SmartTV"))
	{
		$start="WebBrowser";
	}

	// Grab the browser version if its present
	preg_match('/'.$start.'[\ |\/]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch);
	$version_o=$regmatch[1];
	$version=substr($version_o,0,strpos($version_o,'.'));

	// Return browser Title and Version, but first..some titles need to be changed
	if(strtolower($title)=="msie"
		&& strtolower($version)=="7.0"
		&& preg_match('/Trident\/4.0/i', $useragent))
	{
		return " 8.0 (Compatibility Mode)"; // Fix for IE8 quirky UA string with Compatibility Mode enabled
	}
	elseif(strtolower($title)=="msie")
	{
		return " ".$version;
	}
	elseif(strtolower($title)=="multi-browser")
	{
		return "Multi-Browser XP ".$version;
	}
	elseif(strtolower($title)=="nf-browser")
	{
		return "NetFront ".$version;
	}
	elseif(strtolower($title)=="semc-browser")
	{
		return "SEMC Browser ".$version;
	}
	elseif(strtolower($title)=="ucweb")
	{
		return "UC Browser ".$version;
	}
	elseif(strtolower($title)=="up.browser"
		|| strtolower($title)=="up.link")
	{
		return "Openwave Mobile Browser ".$version;
	}
	elseif(strtolower($title)=="chromeframe")
	{
		return "Google Chrome Frame ".$version;
	}
	elseif(strtolower($title)=="mozilladeveloperpreview")
	{
		return "Mozilla Developer Preview ".$version;
	}
	elseif(strtolower($title)=="multi-browser")
	{
		return "Multi-Browser XP ".$version;
	}
	elseif(strtolower($title)=="opera mobi")
	{
		return "Opera Mobile ".$version;
	}
	elseif(strtolower($title)=="osb-browser")
	{
		return "Gtk+ WebCore ".$version;
	}
	elseif(strtolower($title)=="tablet browser")
	{
		return "MicroB ".$version;
	}
	elseif(strtolower($title)=="tencenttraveler")
	{
		return "TT Explorer ".$version;
	}
	elseif(strtolower($title)=="crmo")
	{
		return "Chrome Mobile ".$version;
	}
	elseif(strtolower($title)=="smarttv")
	{
		return "Maple Browser ".$version;
	}
	elseif(strtolower($title)=="wp-android"
		|| strtolower($title)=="wp-iphone")
	{
		//TODO check into Android version being returned
		return "Wordpress App ".$version;
	}
	elseif(strtolower($title)=="atomicbrowser")
	{
		return "Atomic Web Browser ".$version;
	}
	elseif(strtolower($title)=="barcapro")
	{
		return "Barca Pro ".$version;
	}
	elseif(strtolower($title)=="dplus")
	{
		return "D+ ".$version;
	}
	elseif(strtolower($title)=="opera labs")
	{
		preg_match('/Edition\ Labs([\ ._0-9a-zA-Z]+);/i', $useragent, $regmatch);
		return $title.$regmatch[1]." ".$version;
	}
	else
	{
		return $title." ".$version;
	}
}

// Detect Platform (check for Device, then OS if no device is found, else return null)
function clrs_detect_platform()
{
	global $useragent, $ua_show_text, $ua_text_links, $ua_hide_unknown_bool;

	if(strlen($detected_platform=clrs_detect_device()) > 0)
	{
		return $detected_platform;
	}
	elseif(strlen($detected_platform=clrs_detect_os()) > 0)
	{
		return $detected_platform;
	}
	else
	{
		$title="Unknown";
		$link="#";
		$code="null";

		if($ua_hide_unknown_bool=='true'
			&& $ua_show_text==2)
		{
			return $title;
		}
	}

	// How should we display this?
	//image and text
	$detected_os=clrs_img($code, "/os/", $title)."<span class='cmt_ua_n'>".$title."</span>";
	return $detected_os;
}

?>