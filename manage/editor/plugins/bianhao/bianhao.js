KindEditor.plugin('bianhao', function(K) {
        var editor = this, name = 'bianhao';
        editor.plugin.bianhao = {
        bianhaoFunc: 
function(e) {
        editor.insertHtml('{{bianhao}}');
        }
        };
        // 点击图标时执行
        editor.clickToolbar(name, editor.plugin.bianhao.bianhaoFunc);
});
