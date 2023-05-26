(function() {
    tinymce.create('tinymce.plugins.vid', {
        init : function(ed, url) {
            ed.addButton('vid', {
                title : 'vid',
                image : url+'/vid.png',
                onclick : function() {
                     ed.selection.setContent('[vid id="?"]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('vid', tinymce.plugins.vid);
})();