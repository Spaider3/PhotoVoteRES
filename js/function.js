// JavaScript Document
//opacity
var t,t2,obj,op;
function appear(x)   // x - конечное значение прозрачности
{
	op = (obj.style.opacity)?parseFloat(obj.style.opacity):parseInt(obj.style.filter)/100;
	
	if(op < x) {
		clearTimeout(t2);
		op += 0.05;
		obj.style.opacity = op;
		obj.style.filter='alpha(opacity='+op*100+')';
		t=setTimeout('appear('+x+')',20);
	}
}
function disappear(x) {
	op = (obj.style.opacity)?parseFloat(obj.style.opacity):parseInt(obj.style.filter)/100;
	
	if(op > x) {
		clearTimeout(t);
		op -= 0.05;
		obj.style.opacity = op;
		obj.style.filter='alpha(opacity='+op*100+')';
		t2=setTimeout('disappear('+x+')',20);
	}
}
//ajax loader
function ajaxLoader(url,id) {
  if (document.getElementById) {
    var x = (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
  }
  if (x) {
    x.onreadystatechange = function() {
      if (x.readyState == 4 && x.status == 200) {
        el = document.getElementById(id);
        el.innerHTML = x.responseText;
      }
    }
    x.open("GET", url, true);
    x.send(null);
  }
}
//butoons
function comment() {
	document.comment.submit();
}
//box
var overlay = document.createElement("div");
overlay.id = "overlay";
overlay.onclick = hideOverlay;
document.body.appendChild(overlay);
function hideOverlay() {
	curlImage = null;
	hide(id("overlay"));
	hide(id("gallerey"));
}
function showOverlay() {
	var over = id("overlay");
	over.style.height = pageHeight() + "px";
	over.style.width = pageWidth() + "px";
	fadeIn(over,50,10);
}
function createMessage(title) {
  var container = document.createElement('div')
  container.innerHTML = '<div class="my-message"> \
    <div class="my-message-title">'+title+'</div> \
    <div class="my-message-body">'+ajaxLoader('edit.php','my-message-body')+'</div> \
    <input class="my-message-ok" type="button" value="OK"/> \
  </div>'
  return container.firstChild
}
function positionMessage(elem) {
  elem.style.position = 'absolute'
  var scroll = document.documentElement.scrollTop || document.body.scrollTop
  elem.style.top = scroll + 200 + 'px'
  elem.style.left = Math.floor(document.body.clientWidth/2) - 150 + 'px'
}
function addCloseOnClick(messageElem) {
  var input = messageElem.getElementsByTagName('INPUT')[0]
  input.onclick = function() {
    messageElem.parentNode.removeChild(messageElem)
  }
}
function setupMessageButton(title) {
  var messageElem = createMessage(title)
  positionMessage(messageElem)
  addCloseOnClick(messageElem)
  document.body.appendChild(messageElem)
}