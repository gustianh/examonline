function MinHeightPlugin(editor) {
    this.editor = editor;
  }

  MinHeightPlugin.prototype.init = function () {
    this.editor.ui.view.editable.extendTemplate({
      attributes: {
        style: {
          minHeight: '300px'
        }
      }
    });
  };

  ClassicEditor.builtinPlugins.push(MinHeightPlugin);
  ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
      console.log(editor);
    })
    .catch(error => {
      console.error(error);
    });
