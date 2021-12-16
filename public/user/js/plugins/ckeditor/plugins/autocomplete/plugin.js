/*
 Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
(function(){function d(a,b){var c=a.config.autocomplete_commitKeystrokes||CKEDITOR.config.autocomplete_commitKeystrokes;this.editor=a;this.throttle=void 0!==b.throttle?b.throttle:20;this.view=this.getView();this.model=this.getModel(b.dataCallback);this.model.itemsLimit=b.itemsLimit;this.textWatcher=this.getTextWatcher(b.textTestCallback);this.commitKeystrokes=CKEDITOR.tools.array.isArray(c)?c.slice():[c];this._listeners=[];this.outputTemplate=void 0!==b.outputTemplate?new CKEDITOR.template(b.outputTemplate):
null;b.itemTemplate&&(this.view.itemTemplate=new CKEDITOR.template(b.itemTemplate));if("ready"===this.editor.status)this.attach();else this.editor.on("instanceReady",function(){this.attach()},this);a.on("destroy",function(){this.destroy()},this)}function g(a){this.itemTemplate=new CKEDITOR.template('\x3cli data-id\x3d"{id}"\x3e{name}\x3c/li\x3e');this.editor=a}function f(a){this.dataCallback=a;this.isActive=!1;this.itemsLimit=0}function h(a){return CKEDITOR.tools.array.reduce(CKEDITOR.tools.object.keys(a),
function(b,c){b[c]=CKEDITOR.tools.htmlEncode(a[c]);return b},{})}CKEDITOR.plugins.add("autocomplete",{requires:"textwatcher",onLoad:function(){CKEDITOR.document.appendStyleSheet(this.path+"skins/default.css")},isSupportedEnvironment:function(){return!CKEDITOR.env.ie||8<CKEDITOR.env.version}});d.prototype={attach:function(){var a=this.editor,b=CKEDITOR.document.getWindow(),c=a.editable(),k=c.isInline()?c:c.getDocument();CKEDITOR.env.iOS&&!c.isInline()&&(k=a.window.getFrame().getParent());this.view.append();
this.view.attach();this.textWatcher.attach();this._listeners.push(this.textWatcher.on("matched",this.onTextMatched,this));this._listeners.push(this.textWatcher.on("unmatched",this.onTextUnmatched,this));this._listeners.push(this.model.on("change-data",this.modelChangeListener,this));this._listeners.push(this.model.on("change-selectedItemId",this.onSelectedItemId,this));this._listeners.push(this.view.on("change-selectedItemId",this.onSelectedItemId,this));this._listeners.push(this.view.on("click-item",
this.onItemClick,this));this._listeners.push(this.model.on("change-isActive",this.updateAriaAttributesOnEditable,this));this._listeners.push(b.on("scroll",function(){this.viewRepositionListener()},this));this._listeners.push(k.on("scroll",function(){this.viewRepositionListener()},this));this._listeners.push(this.view.element.on("mousedown",function(a){a.data.preventDefault()},null,null,9999));c&&(this.registerPanelNavigation(),this.addAriaAttributesToEditable());a.on("contentDom",function(){this.registerPanelNavigation();
this.addAriaAttributesToEditable()},this)},registerPanelNavigation:function(){var a=this.editor.editable();this._listeners.push(a.attachListener(a,"keydown",function(a){this.onKeyDown(a)},this,null,5))},addAriaAttributesToEditable:function(){var a=this.editor.editable(),b=this.view.element.getAttribute("id");a.isInline()&&(a.setAttribute("aria-controls",b),a.setAttribute("aria-activedescendant",""),a.setAttribute("aria-autocomplete","list"),a.setAttribute("aria-expanded","false"))},updateAriaAttributesOnEditable:function(a){var b=
this.editor.editable();a=a.data;b&&b.isInline()&&(b.setAttribute("aria-expanded",a?"true":"false"),a||b.setAttribute("aria-activedescendant",""))},updateAriaActiveDescendantAttributeOnEditable:function(a){var b=this.editor.editable();b.isInline()&&b.setAttribute("aria-activedescendant",a)},removeAriaAttributesFromEditable:function(){var a=this.editor.editable();a&&a.isInline()&&(a.removeAttributes(["aria-controls","aria-expanded","aria-activedescendant"]),a.setAttribute("aria-autocomplete","none"))},
close:function(){this.model.setActive(!1);this.view.close()},commit:function(a){if(this.model.isActive){this.close();if(null==a&&(a=this.model.selectedItemId,null==a))return;a=this.model.getItemById(a);var b=this.editor;b.fire("saveSnapshot");b.getSelection().selectRanges([this.model.range]);b.insertHtml(this.getHtmlToInsert(a),"text");b.fire("saveSnapshot")}},destroy:function(){CKEDITOR.tools.array.forEach(this._listeners,function(a){a.removeListener()});this._listeners=[];this.view.element&&this.view.element.remove();
this.removeAriaAttributesFromEditable()},getHtmlToInsert:function(a){a=h(a);return this.outputTemplate?this.outputTemplate.output(a):a.name},getModel:function(a){var b=this;return new f(function(c,k){return a.call(this,CKEDITOR.tools.extend({autocomplete:b},c),k)})},getTextWatcher:function(a){return new CKEDITOR.plugins.textWatcher(this.editor,a,this.throttle)},getView:function(){return new g(this.editor)},open:function(){this.model.hasData()&&(this.model.setActive(!0),this.view.open(),this.model.selectFirst(),
this.view.updatePosition(this.model.range))},viewRepositionListener:function(){this.model.isActive&&this.view.updatePosition(this.model.range)},modelChangeListener:function(a){this.model.hasData()?(this.view.updateItems(a.data),this.open()):this.close()},onItemClick:function(a){this.commit(a.data)},onKeyDown:function(a){if(this.model.isActive){var b=a.data.getKey(),c=!1;27==b?(this.close(),this.textWatcher.unmatch(),c=!0):40==b?(this.model.selectNext(),c=!0):38==b?(this.model.selectPrevious(),c=!0):
-1!=CKEDITOR.tools.indexOf(this.commitKeystrokes,b)&&(this.commit(),this.textWatcher.unmatch(),c=!0);c&&(a.cancel(),a.data.preventDefault(),this.textWatcher.consumeNext())}},onSelectedItemId:function(a){a=a.data;var b=this.view.getItemById(a);this.model.setItem(a);this.view.selectItem(a);this.updateAriaActiveDescendantAttributeOnEditable(b.getAttribute("id"))},onTextMatched:function(a){this.model.setActive(!1);this.model.setQuery(a.data.text,a.data.range)},onTextUnmatched:function(){this.model.query=
null;this.model.lastRequestId=null;this.close()}};g.prototype={append:function(){this.document=CKEDITOR.document;this.element=this.createElement();this.document.getBody().append(this.element)},appendItems:function(a){this.element.setHtml("");this.element.append(a)},attach:function(){this.element.on("click",function(a){(a=a.data.getTarget().getAscendant(this.isItemElement,!0))&&this.fire("click-item",a.data("id"))},this);this.element.on("mouseover",function(a){a=a.data.getTarget();this.element.contains(a)&&
(a=a.getAscendant(function(a){return a.hasAttribute("data-id")},!0))&&(a=a.data("id"),this.fire("change-selectedItemId",a))},this)},close:function(){this.element.removeClass("cke_autocomplete_opened")},createElement:function(){var a=new CKEDITOR.dom.element("ul",this.document),b=CKEDITOR.tools.getNextId();a.setAttribute("id",b);a.addClass("cke_autocomplete_panel");a.setStyle("z-index",this.editor.config.baseFloatZIndex-3);a.setAttribute("role","listbox");return a},createItem:function(a){a=h(a);a=
CKEDITOR.dom.element.createFromHtml(this.itemTemplate.output(a),this.document);var b=CKEDITOR.tools.getNextId();a.setAttribute("id",b);a.setAttribute("role","option");return a},getViewPosition:function(a){a=a.getClientRects();a=a[a.length-1];var b;b=this.editor.editable();b=b.isInline()?CKEDITOR.document.getWindow().getScrollPosition():b.getParent().getDocumentPosition(CKEDITOR.document);var c=CKEDITOR.document.getBody();"static"===c.getComputedStyle("position")&&(c=c.getParent());c=c.getDocumentPosition();
b.x-=c.x;b.y-=c.y;return{top:a.top+b.y,bottom:a.top+a.height+b.y,left:a.left+b.x}},getItemById:function(a){return this.element.findOne('li[data-id\x3d"'+a+'"]')},isItemElement:function(a){return a.type==CKEDITOR.NODE_ELEMENT&&Boolean(a.data("id"))},open:function(){this.element.addClass("cke_autocomplete_opened")},selectItem:function(a){null!=this.selectedItemId&&this.getItemById(this.selectedItemId).removeClass("cke_autocomplete_selected");var b=this.getItemById(a);b.addClass("cke_autocomplete_selected");
this.selectedItemId=a;this.scrollElementTo(b)},setPosition:function(a){var b=this.element.getWindow(),c=b.getViewPaneSize(),b=function(a){var b=a.editorViewportRect,c=a.caretRect,e=a.viewHeight,d=a.scrollPositionY,g=a.windowHeight;if(b.bottom<c.bottom)return Math.min(c.top,b.bottom)-e;a=c.top-b.top;var f=b.bottom-c.bottom,h=c.top-e<d;if(e>f&&e<a&&!h)return c.top-e;if(b.top>c.top)return Math.max(c.bottom,b.top);d=c.bottom+e>g+d;return e>f&&e<a||!d?Math.min(b.bottom,c.bottom):c.top-e}({editorViewportRect:function(a){var b=
a.editable();return CKEDITOR.env.iOS&&!b.isInline()?a.window.getFrame().getParent().getClientRect(!0):b.isInline()?b.getClientRect(!0):a.window.getFrame().getClientRect(!0)}(this.editor),caretRect:a,viewHeight:this.element.getSize("height"),scrollPositionY:b.getScrollPosition().y,windowHeight:c.height});a=function(a){var b=a.leftPosition,c=a.viewWidth;a=a.windowWidth;return b+c>a?a-c:b}({leftPosition:a.left,viewWidth:this.element.getSize("width"),windowWidth:c.width});this.element.setStyles({left:a+
"px",top:b+"px"})},scrollElementTo:function(a){a.scrollIntoParent(this.element)},updateItems:function(a){var b,c=new CKEDITOR.dom.documentFragment(this.document);for(b=0;b<a.length;++b)c.append(this.createItem(a[b]));this.appendItems(c);this.selectedItemId=null},updatePosition:function(a){this.setPosition(this.getViewPosition(a))}};CKEDITOR.event.implementOn(g.prototype);f.prototype={getIndexById:function(a){if(!this.hasData())return-1;for(var b=this.data,c=0,d=b.length;c<d;c++)if(b[c].id==a)return c;
return-1},getItemById:function(a){a=this.getIndexById(a);return~a&&this.data[a]||null},hasData:function(){return Boolean(this.data&&this.data.length)},setItem:function(a){if(0>this.getIndexById(a))throw Error("Item with given id does not exist");this.selectedItemId=a},select:function(a){this.fire("change-selectedItemId",a)},selectFirst:function(){this.hasData()&&this.select(this.data[0].id)},selectLast:function(){this.hasData()&&this.select(this.data[this.data.length-1].id)},selectNext:function(){if(null==
this.selectedItemId)this.selectFirst();else{var a=this.getIndexById(this.selectedItemId);0>a||a+1==this.data.length?this.selectFirst():this.select(this.data[a+1].id)}},selectPrevious:function(){if(null==this.selectedItemId)this.selectLast();else{var a=this.getIndexById(this.selectedItemId);0>=a?this.selectLast():this.select(this.data[a-1].id)}},setActive:function(a){this.isActive=a;this.fire("change-isActive",a)},setQuery:function(a,b){var c=this,d=CKEDITOR.tools.getNextId();this.lastRequestId=d;
this.query=a;this.range=b;this.selectedItemId=this.data=null;this.dataCallback({query:a,range:b},function(a){d==c.lastRequestId&&(c.data=c.itemsLimit?a.slice(0,c.itemsLimit):a,c.fire("change-data",c.data))})}};CKEDITOR.event.implementOn(f.prototype);CKEDITOR.plugins.autocomplete=d;d.view=g;d.model=f;CKEDITOR.config.autocomplete_commitKeystrokes=[9,13]})();