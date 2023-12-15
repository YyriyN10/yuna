
( function ( blocks, React, blockEditor ) {
  var el = React.createElement;

  blocks.registerBlockType( 'yuna-study/basic-block', {
    edit: function ( props ) {
      var blockProps = blockEditor.useBlockProps();
      return el(
        'p',
        blockProps,
        'Hello World (from the editor, in green).'
      );
    },
    save: function () {
      var blockProps = blockEditor.useBlockProps.save();
      return el(
        'p',
        blockProps,
        'Hello World (from the frontend, in red).'
      );
    },
  } );
} )( window.wp.blocks, window.React, window.wp.blockEditor );