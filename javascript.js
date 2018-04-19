"use strict";

var czyRuszaBialy=true;
var color;
var szachownica = {

};

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setThemeColor(color)
{

		document.getElementById('or').disabled  = true;
		document.getElementById('bl').disabled= false;
	
			if(color=='bl')
	{
		document.getElementById('or').disabled  = true;
		document.getElementById('bl').disabled = false;
	}
		else if(color=='or')
	{
		document.getElementById('or').disabled  = false;
		document.getElementById('bl').disabled = true;
	}
}

function checkCookieColor() {
    var color=getCookie("themeColor");

	if(color=="")
	{
		document.getElementById('or').disabled  = true;
		document.getElementById('bl').disabled = false;
	}
	else
	setThemeColor(color);

}

function checkCookiePionki() {
    var pionki=getCookie("pionki");

	if(pionki=="")
	{
	szachownica.iloscPionkow = 12;
	}
	else
	szachownica.iloscPionkow = parseInt(pionki);
}

window.onload = checkCookieColor();


function setActiveStyleSheet()
{
	var parametrIlosciPionkow= document.getElementById("changeNumber").value;
	szachownica.iloscPionkow = parametrIlosciPionkow;
	
		document.getElementById('or').disabled  = true;
		document.getElementById('bl').disabled = false;
	
	var color = document.getElementById("changeColor").value;

	setThemeColor(color);
	
	setCookie("themeColor", color, 30);
	setCookie("pionki" , parametrIlosciPionkow, 30);
}

function changePage(file) {
  var xhttp = new XMLHttpRequest();											//laczenie z serwerem
  xhttp.onreadystatechange = function() {										//funkcja odpalana w chwili zmiany stanu polaczenia
    if (this.readyState == 4 && this.status == 200) {						//readyState- zawiera aktualny status polaczenia, 4- dane zwrocone i gotowe do uzycia. status- zwraca status - 200: OK
      document.getElementById("zawartosc").innerHTML =
      this.responseText;																//zwrocone dane w formie tekstu
    }
  };
  xhttp.open("GET", file, true);														//otwiera polaczenie do serwera (wybor metody, wybor pliku, czy polaczenie ma byc asynchroniczne)
  xhttp.send();																			//wysyla zadanie do serwera		
}

function changePage2(wybranyDiv) {
		      document.getElementById("zawartosc").innerHTML =document.getElementById(wybranyDiv).innerHTML ;		
}


function stworzSzachownice()
{
	

	
var mojDiv='<div id="turaLewo">BIALE</div><table id="szachownica"><tr><td class="pusty"></td>';

	for(var g=0;g<8;g++)
	mojDiv=mojDiv+'<td class="oznaczenieL">'+String.fromCharCode(65+g)+'</td>';

	for(var i=0;i<32;i++)
	{
		if(i%4==0)
		{
			var j=i;
			j=j/4+1;
			mojDiv=mojDiv+	'</tr><tr><td class="oznaczenie">'+j+'</td>';
		}
		if(i%8<4)
			mojDiv=mojDiv+'<td id="'+i+'" class="ciemny" onclick="aktywujPole(this.id)"><canvas id="myCanvas'+i+'" width="40=" height="40"></canvas></td><td class="jasny"></td>';
		else
			mojDiv=mojDiv+'<td class="jasny"></td><td id="'+i+'" class="ciemny" onclick="aktywujPole(this.id)"><canvas id="myCanvas'+i+'" width="40=" height="40"></canvas></td>';
	}

	mojDiv=mojDiv+'</tr></table><div id="turaPrawo">CZARNE</div>'
	document.getElementById("zawartosc").innerHTML = mojDiv;


	var p=0;
	if(szachownica.iloscPionkow)
		p=12-szachownica.iloscPionkow;
		
	var iloscBialych = szachownica.iloscPionkow;
	var iloscCzarnych = szachownica.iloscPionkow;
	szachownica.iloscBialych=iloscBialych;
	szachownica.iloscCzarnych=iloscCzarnych;

generujPionki(p);
generujPlansze();
}

function rysujPojedynczyPionek(i, kolorObwodu, kolorWnetrza, gruboscObwodu)
{
	  var canvas = document.getElementById('myCanvas'+i);
      var context = canvas.getContext('2d');
      var centerX = canvas.width / 2;
      var centerY = canvas.height / 2;
      var radius = 15;


      context.beginPath();
      context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
      context.fillStyle = kolorWnetrza;
      context.fill();
      context.lineWidth = gruboscObwodu;
      context.strokeStyle = kolorObwodu;
      context.stroke();
}

function rysujPuste(i)
{
      var canvas = document.getElementById('myCanvas'+i);
      var context = canvas.getContext('2d');
      //context.beginPath();
		context.clearRect(0, 0, canvas.width, canvas.height);
}

function generujPionki(p)
{
	
	var podswietlony = -1;
	var czyDamka = new Array(32);
	var czyZyje = new Array(32);
	var czyBialy = new Array(32);
	
	for(var i=0; i<12-p;i++)
		{
			czyBialy[i]=true;
			czyZyje[i]=true;
		}
	
	for(i=12-p; i<20+p;i++)
		{
			czyBialy[i]=false;
			czyZyje[i]=false;
		}
	
	for(i=20+p;i<32;i++)
		{
			czyBialy[i]=false;
			czyZyje[i]=true;
		}		
		
	szachownica.czyDamka=czyDamka;
	szachownica.czyBialy = czyBialy;
	szachownica.czyZyje = czyZyje;
	szachownica.podswietlony=podswietlony;
	zasiegPionkow();
	
}

function zasiegDamki()
{
	var lewoGora = new Array(8);
	var prawoGora = new Array(7);

}

function zasiegPionkow()
{	
	var lewoBialy = new Array(32);
	var prawoBialy = new Array(32);
	
	var lewoCzarny = new Array(32);
	var prawoCzarny = new Array(32);
	
	for(var i=0;i<32;i++)
	{
							if(i%8<4)
							{
								lewoCzarny[i] = i - 5;//i-4
								prawoCzarny[i] = i - 4;
								lewoBialy[i] = i + 3;
								prawoBialy[i] = i + 4;
							}
							else
							{
								lewoCzarny[i]=i-4;
								prawoCzarny[i] = i-3;
								lewoBialy[i]=i+4;
								prawoBialy[i] = i+5;
							}
							
							if(i%8==0)
							{
								lewoCzarny[i]=-1;
								lewoBialy[i]=-1;
							}
							if((i+1)%8==0)
							{
								prawoCzarny[i]=-1;
								prawoBialy[i]=-1;
							}
							if(i<4)
							{
								lewoCzarny[i]=-1;
								prawoCzarny[i]=-1;								
							}
							if(i>27)
							{
								prawoBialy[i]=-1;
								lewoBialy[i]=-1;
							}
	}
	szachownica.lewoBialy=lewoBialy;
	szachownica.prawoBialy=prawoBialy;
	szachownica.lewoCzarny=lewoCzarny;
	szachownica.prawoCzarny=prawoCzarny;
}


function generujPlansze()
{
	for(var i=0;i<32;i++)
	{	
		if(szachownica.czyZyje[i])
		{
				if(szachownica.czyBialy[i])
				{
					if(!szachownica.czyDamka[i])
					//document.getElementById(i).style.backgroundImage="url(bialy1.png)";
					//rysujBialego(i);
					rysujPojedynczyPionek(i, '#999999', 'white',4);
					else
					rysujPojedynczyPionek(i, '#999999', 'white',8);
					//document.getElementById(i).style.backgroundImage="url(bialyDamka.png)";
				}
				else
				{	
					if(!szachownica.czyDamka[i])
					//document.getElementById(i).style.backgroundImage="url(czarny1.png)";
					//rysujCzarnego(i);
					rysujPojedynczyPionek(i, '#333333', 'black',4);
					else
					{	
						rysujPojedynczyPionek(i, '#333333', 'black',8);
						//document.getElementById(i).style.backgroundImage="url(czarnyDamka.png)";
					}
				}
		}
		else
		{
			rysujPuste(i);
			//document.getElementById(i).style.backgroundColor="#331a00";
				//document.getElementById(i).style.backgroundImage=null;	
		}
	}
}

function ruszPionek(boolean1, boolean2, boolean3, czyDamka, x)
{
		szachownica.czyZyje[szachownica.podswietlony]=boolean1;
		szachownica.czyBialy[x]=boolean2;						
		szachownica.czyZyje[x]=boolean3;
		szachownica.czyDamka[x]=czyDamka;
		szachownica.czyDamka[szachownica.podswietlony]=false;
}


function bicie(polozeniePrzeciwnika, x, czyRuchBialego)			////////////chyba nie przenosi wartosci damki
{
		//alert("polozeniePrzeciwnika"+polozeniePrzeciwnika);
		//alert("x:"+x);
	
		if((!szachownica.czyZyje[polozeniePrzeciwnika])&&(polozeniePrzeciwnika!=-1))
		{
		szachownica.czyZyje[polozeniePrzeciwnika]=true;
		szachownica.czyBialy[polozeniePrzeciwnika]=!czyRuchBialego;
		szachownica.czyZyje[szachownica.podswietlony]=false;
		szachownica.czyZyje[x]=false;
		szachownica.czyDamka[x]=false;
		czyRuszaBialy=czyRuchBialego;

		
		if(szachownica.czyDamka[szachownica.podswietlony])
		{
			
			szachownica.czyDamka[szachownica.podswietlony]=false;
			szachownica.czyDamka[szachownica.polozeniePrzeciwnika]=true;
			
		//alert(szachownica.czyDamka[szachownica.podswietlony]);
		//alert(szachownica.czyDamka[szachownica.polozeniePrzeciwnika]);
		}
		
		szachownica.podswietlony=-1;

		if(czyRuchBialego)
			szachownica.iloscBialych--;
		else
			szachownica.iloscCzarnych--;
		
		sprawdzWygrana();
		}	

}

function sprawdzWygrana()
		{
			if(szachownica.iloscBialych==0)
				alert("Czarne wygrały!")
			else if(szachownica.iloscCzarnych==0)
				alert("Biale wygraly!");
		}


function czyMiejsceZa(miejsceZa, x, miejsceAtaku, czyRuchBialego)		//nie uzyta jeszcze
{
			if(miejsceZa==x)
		{
			bicie(miejsceAtaku, x,czyRuchBialego);

		}
}

function sprawdzLewoGora(x, podswietlony)
{
	if(szachownica.lewoCzarny[podswietlony]==szachownica[x])
		return true;
	else if(szachownica.czyZyje[szachownica.lewoCzarny[podswietlony]])
		return false;
	
	if(sprawdzLewoGora(x,szachownica.lewoCzarny[podswietlony]))
		return true;

	
}

function aktywujPole(x)
{

	if((szachownica.podswietlony!=-1)||((czyRuszaBialy&&szachownica.czyBialy[x])||((!czyRuszaBialy)&&(!szachownica.czyBialy[x]))))
	{
			if(szachownica.czyZyje[x])
			{
				if(szachownica.podswietlony!=-1)
				{
					if((szachownica.czyZyje[x])&&czyRuszaBialy&&(!szachownica.czyBialy[x]))
					{
						czyMiejsceZa(szachownica.lewoBialy[szachownica.podswietlony],x,szachownica.lewoBialy[x],false);
						czyMiejsceZa(szachownica.prawoBialy[szachownica.podswietlony],x,szachownica.prawoBialy[x],false);
						czyMiejsceZa(szachownica.lewoCzarny[szachownica.podswietlony],x,szachownica.lewoCzarny[x],false);
						czyMiejsceZa(szachownica.prawoCzarny[szachownica.podswietlony],x,szachownica.prawoCzarny[x],false);
							document.getElementById("turaLewo").style.backgroundColor = "#404040";
							document.getElementById("turaPrawo").style.backgroundColor = "white";						
					}

					else if((szachownica.czyZyje[x])&&(!czyRuszaBialy)&&(szachownica.czyBialy[x]))
					{
						czyMiejsceZa(szachownica.lewoCzarny[szachownica.podswietlony],x,szachownica.lewoCzarny[x],true);
						czyMiejsceZa(szachownica.prawoCzarny[szachownica.podswietlony],x,szachownica.prawoCzarny[x],true);
						czyMiejsceZa(szachownica.lewoBialy[szachownica.podswietlony],x,szachownica.lewoBialy[x],true);
						czyMiejsceZa(szachownica.prawoBialy[szachownica.podswietlony],x,szachownica.prawoBialy[x],true);
							document.getElementById("turaLewo").style.backgroundColor = "white";
							document.getElementById("turaPrawo").style.backgroundColor = "#404040";
					}
				}
				else if((czyRuszaBialy&&szachownica.czyBialy[x])||((!czyRuszaBialy)&&(!szachownica.czyBialy[x])))
				szachownica.podswietlony=x;
			
			}
			else if(szachownica.podswietlony!=-1)
			{
					if(szachownica.czyBialy[szachownica.podswietlony])
					{
						if((szachownica.lewoBialy[szachownica.podswietlony]==x)||(szachownica.prawoBialy[szachownica.podswietlony]==x)||
						((szachownica.czyDamka[szachownica.podswietlony])&&(szachownica.lewoCzarny[szachownica.podswietlony]==x))||	
						((szachownica.czyDamka[szachownica.podswietlony])&&(szachownica.prawoCzarny[szachownica.podswietlony]==x))
						)
							
						{		
							ruszPionek(false,true,true, szachownica.czyDamka[szachownica.podswietlony], x);
							czyRuszaBialy=false;
							document.getElementById("turaLewo").style.backgroundColor = "#404040";
							document.getElementById("turaPrawo").style.backgroundColor = "white";
							//alert("Tura czarnych");


							if(x>27)
							{
								szachownica.czyDamka[x]=true;
							}
						}
					}
					else if(!szachownica.czyBialy[szachownica.podswietlony])
					{

						
						if((szachownica.lewoCzarny[szachownica.podswietlony]==x)||(szachownica.prawoCzarny[szachownica.podswietlony]==x)||
						((szachownica.czyDamka[szachownica.podswietlony])&&(szachownica.lewoBialy[szachownica.podswietlony]==x))||	
						((szachownica.czyDamka[szachownica.podswietlony])&&(szachownica.prawoBialy[szachownica.podswietlony]==x))
						)
						{

							ruszPionek(false,false,true, szachownica.czyDamka[szachownica.podswietlony], x);
							czyRuszaBialy=true;

							document.getElementById("turaLewo").style.backgroundColor = "white";
							document.getElementById("turaPrawo").style.backgroundColor = "#404040";
							if(x<4)
							{
								szachownica.czyDamka[x]=true;
							}
						}
					}
							szachownica.podswietlony=-1;
			}
			generujPlansze();
	}
}

function podMysza(x)
{
		document.getElementById(x).style.backgroundColor='#663500';
}

function bezMyszy(x)
{
		document.getElementById(x).style.backgroundColor='#331a00';
}

