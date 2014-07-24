window.tpl = {
    // Hash of preloaded templates for the app
    templates:{},


    /**
     * Recursively pre-load all the templates for the app.
     * This implementation should be changed in a production environment.
     * All the template files should be concatenated in a single file.
     *
     * @param  array     names      Nome das páginas de template HTML
     * @param  function  callback   Função executada após carregar todos os templates
     */
    loadTemplates:function (names, callback) {
        var that = this;

        var loadTemplate = function (index) {
            
            var name = names[index];
            
            $.get(appConfig.folder.tpl + name + '.html', function (data) {
                that.templates[name] = data;
                index++;
                if (index < names.length) {
                    loadTemplate(index);
                } else {
                    callback();
                }
            });

            // console.log('Loading template: ' + name);
        };

        loadTemplate(0);
    },


    /**
     * [get description]
     * @param  string name ID do template
     * @return string      HTML
     */
    get:function (name) {
        return this.templates[name];
    }
};

/**
*   substitui strings >> replaceAll(str, '.', ':');
*   @param  string   : string utilizada
*   @param  token    : termo buscado
*   @param  newtoken : termo irá substituir
*/
function replaceAll(string, token, newtoken) {
    while (string.indexOf(token) != -1) {
        string = string.replace(token, newtoken);
    }
    return string;
}