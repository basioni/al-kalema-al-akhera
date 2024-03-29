(function() {
	// Creates a new plugin class and a custom listbox
	tinymce.create('tinymce.plugins.themifyMenu', {
		init : function(ed, url) {
			tinymce.plugins.themifyMenu.theurl = url;			
		},
		createControl: function(n, cm) {
			if (n != 'btnthemifyMenu' || typeof(themifyEditor) === 'undefined' ) return null;

			var c = cm.createMenuButton('themifyMenu', {
				title : themifyEditor.editor.menuTooltip,
				image : tinymce.plugins.themifyMenu.theurl + '/../img/themify-editor-icon.png'
			});
			
			var p = this;
			c.onRenderMenu.add(function(c, m) {
				ed = tinyMCE.activeEditor;
				
				m.add({title : themifyEditor.editor.menuName, 'class' : 'mceMenuItemTitle'}).setDisabled(1);
				
				p.themifyDialog(themifyEditor.editor.button, 'button', 400, 550, m, ed);
				
				c = m.addMenu({title:themifyEditor.editor.columns});
				p.themifyCol( themifyEditor.editor.half21, '2-1', c, ed);
				p.themifyCol( themifyEditor.editor.half21first, '2-1 first', c, ed);
				p.themifyCol( themifyEditor.editor.third31, '3-1', c, ed);
				p.themifyCol( themifyEditor.editor.third31first, '3-1 first', c, ed);
				p.themifyCol( themifyEditor.editor.quarter41, '4-1', c, ed);
				p.themifyCol( themifyEditor.editor.quarter41first, '4-1 first', c, ed);
				
				p.themifyDialog(themifyEditor.editor.image, 'img', 400, 250, m, ed);
				p.themifyDialog(themifyEditor.editor.horizontalRule, 'hr', 400, 270, m, ed);
				p.themifyWrap(themifyEditor.editor.quote, 'quote', m, ed);
				p.themifyWrap(themifyEditor.editor.isLoggedIn, 'is_logged_in', m, ed);
				p.themifyWrap(themifyEditor.editor.isGuest, 'is_guest', m, ed);
				p.themifyDialog(themifyEditor.editor.map, 'map', 400, 350, m, ed);
				p.themifyDialog(themifyEditor.editor.video, 'video', 400, 250, m, ed);
				p.themifyDialog(themifyEditor.editor.flickr, 'flickr', 400, 450, m, ed);
				p.themifyDialog(themifyEditor.editor.twitter, 'twitter', 400, 340, m, ed);
				p.themifyDialog(themifyEditor.editor.postSlider, 'post_slider', 400, 510, m, ed);
				
				c = m.addMenu({title: themifyEditor.editor.customSlider});
				p.themifyWrapDialog( themifyEditor.editor.slider, 'slider', 400, 520, c, ed);
				p.themifyWrap( themifyEditor.editor.slide, 'slide', c, ed);
				
				p.themifyDialog(themifyEditor.editor.listPosts, 'list_posts', 400, 500, m, ed);
				p.themifyWrapDialog( themifyEditor.editor.box, 'box', 400, 210, m, ed);
				p.themifyDialog(themifyEditor.editor.authorBox, 'author_box', 400, 450, m, ed);
			});
	
			return c;
		},
		themifyDialog : function(t, sc, w, h, m, ed){
			m.add({
				title : t,
				onclick : function() {
					ed.windowManager.open({
						file : tinymce.plugins.themifyMenu.theurl + '/dialog.php?shortcode=' + sc + '&title=' + t,
						width : w,
						height : h,
						inline : 1
					});
				}
			});
		},
		themifyWrapDialog : function(t, sc, w, h, m, ed){
			m.add({
				title : t,
				onclick : function() {
					ed.windowManager.open({
						file : tinymce.plugins.themifyMenu.theurl + '/dialog.php?shortcode=' + sc + '&title=' + t + '&selection=' + encodeURIComponent(ed.selection.getContent()),
						width : w,
						height : h,
						inline : 1
					});
				}
			});
		},
		themifyWrap : function(t, sc, m, ed) {
			m.add({
				title : t,
				onclick : function() {
					ed.selection.setContent('[' + sc + ']' + ed.selection.getContent() + '[/' + sc + ']');
				}
			})
		},
		themifyCol : function(t, grid, m, ed) {
			m.add({
				title : t,
				onclick : function() {
					ed.selection.setContent('[col grid="' + grid + '"]' + ed.selection.getContent() + '[/col]');
				}
			})
		}
	});
	tinymce.PluginManager.add('themifyMenu', tinymce.plugins.themifyMenu);
})();