function initNavigation() 
{
  /* Menu du Bandeau Supérieur */
	initMenuDeroulant('bandeau_superieur');
  
  /* Menu Vertical */
  initMenuHierarchique('navigation_secondaire');
}

/************************************************************/
/* Menu sensible au clic de la souris                       */
/* Necessite la structure suivante :                        */
/* <ul id="identifiant">                                    */
/*   <li class="interactif"><a href="cible">Cliquez-moi</a> */
/*   <ul>                                                   */
/*     <li>sous-element 1</li>                              */
/*     <li>sous-element 2</li>                              */
/*   </li>                                                  */
/* </ul>                                                    */
/* le clic sur le lien dévoilera/masquera la liste fille    */
/************************************************************/
function initMenuHierarchique(identifiant)
{
  if (!document.getElementById(identifiant)) return;

  // Ferme toutes les listes interactives
  var lists = document.getElementById(identifiant).getElementsByTagName('li');
  for (var i=0;i<lists.length;i++)
  {
    if (lists[i].className != 'interactif') continue;
    changeClasse(lists[i], 'ferme');
  }
  
  // Permet aux liens fils des listes interactives d'ouvrir des sous-listes
  var links = document.getElementById(identifiant).getElementsByTagName('a');
  for (var i=0;i<links.length;i++)
  {
    if (links[i].parentNode.className.indexOf('interactif')) continue;
    links[i].onclick = function (e) {
  		var node = (e) ? this : window.event.srcElement;
  		return changeClasse(node.parentNode, 'ferme');
    };
  }
}

/* Ajoute ou supprime une classe à un element HTML */
function changeClasse(element, classe) 
{
  if (element[classe]) 
  {
    element.className = element.className.replace(classe,'');
    element[classe] = false;
  }
  else 
  {
    element.className = element.className + ' ' + classe;
    element[classe] = true;
  }
  return false;
}

/* Courtesy of www.quirksmode.org */

/* Menu sensible au passage de la souris */
function initMenuDeroulant(identifiant)
{
  if (!document.getElementById(identifiant)) return;

	var lists = document.getElementById(identifiant).getElementsByTagName('ul');
	for (var i=0;i<lists.length;i++) 
	{
		if (lists[i].className != 'menutree') continue;
		lists[i].onmouseover = navMouseOver;
		lists[i].onmouseout = navMouseOut;
		var listItems = lists[i].getElementsByTagName('li');
		for (var j=0;j<listItems.length;j++) 
		{
			var test = listItems[j].getElementsByTagName('ul')[0];
			if (test) 
			{
				listItems[j].firstChild.onfocus = navMouseOver;
				listItems[j].relatedItem = test;
			}
		}
	}
}

var currentlyOpenedMenus = new Array();
var currentlyFocusedItem;

function navMouseOver(e) {
	var evt = e || window.event;
	var evtTarget = evt.target || evt.srcElement;
	if (evtTarget.nodeName == 'UL') return;
	while (evtTarget.nodeName != 'LI')
		evtTarget = evtTarget.parentNode;
	foldMenuIn(evtTarget);
	if (evtTarget.relatedItem && !evtTarget.relatedItem.opened) {
		evtTarget.className = 'highlight';
		evtTarget.relatedItem.className = 'foldOut';
		evtTarget.relatedItem.opened = true;
		currentlyOpenedMenus.push(evtTarget.relatedItem);
	}
}

function navMouseOut(e) {
	var evt = e || window.event;
	var relatedNode = evt.relatedTarget || evt.toElement;
	foldMenuIn(relatedNode);
}

function foldMenuIn(targetNode) {
	var newCurrentlyOpenedMenus = new Array();
	for (var i=0;i<currentlyOpenedMenus.length;i++) {
		if (!containsElement(currentlyOpenedMenus[i],targetNode)) {
			currentlyOpenedMenus[i].className = '';
			currentlyOpenedMenus[i].parentNode.className = '';
			currentlyOpenedMenus[i].opened = false;
		}
		else
			newCurrentlyOpenedMenus.push(currentlyOpenedMenus[i]);
	}
	currentlyOpenedMenus = newCurrentlyOpenedMenus;
}

function containsElement(obj1,obj2) {
	// Fix Firefox bug
	if(!window.event && obj2 instanceof HTMLDivElement) { try { obj2.nodeName; return false } catch (e) { return true } }
	
	if(!obj2 || typeof(obj2) == "undefined") return false;
	
	while (obj2.nodeName != 'HTML') {
		if (obj2 == obj1) return true;
		obj2 = obj2.parentNode;
	}
	return false;
}

function addEventSimple(obj,evt,fn) {
	if (obj.addEventListener)
		obj.addEventListener(evt,fn,false);
	else if (obj.attachEvent)
		obj.attachEvent('on'+evt,fn);
}

/** PUSH AND SHIFT FOR IE5 **/

function Array_push() {
	var A_p = 0
	for (A_p = 0; A_p < arguments.length; A_p++) {
		this[this.length] = arguments[A_p]
	}
	return this.length
}

if (typeof Array.prototype.push == "undefined") {
	Array.prototype.push = Array_push
}

function Array_shift() {
	var A_s = 0
	var response = this[0]
	for (A_s = 0; A_s < this.length-1; A_s++) {
		this[A_s] = this[A_s + 1]
	}
	this.length--
	return response
}

if (typeof Array.prototype.shift == "undefined") {
	Array.prototype.shift = Array_shift
}


addEventSimple(window, 'load', initNavigation);