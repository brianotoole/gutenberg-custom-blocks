/**
 * BLOCK: Basic Editable Text Block
 * 
 * https://wordpress.org/gutenberg/handbook/block-api/
 */


// Define global block vars
var 
  el = wp.element.createElement,
  registerBlockType = wp.blocks.registerBlockType,
  BlockControls = wp.editor.BlockControls,
  AlignmentToolbar = wp.editor.AlignmentToolbar,
  RichText = wp.editor.RichText;


// Register block type
registerBlockType( 'bzo/text-block', {

    title: 'Custom Text Block',
    icon: 'universal-access-alt',
	  category: 'common',
	  attributes: {
      content: {
        type: 'array',
        source: 'children',
        selector: 'p',
      },
      alignment: {
        type: 'string',
      },
    },

    edit: function(props) {
      var 
      content = props.attributes.content,
      alignment = props.attributes.alignment;
      function onChangeContent( newContent ) {
        props.setAttributes( { content: newContent } );
      }
      function onChangeAlignment( newAlignment ) {
        props.setAttributes( { alignment: newAlignment } );
      }
      return [
        el(
            BlockControls,
            { key: 'controls' },
            el(
                AlignmentToolbar,
                {
                    value: alignment,
                    onChange: onChangeAlignment
                }
            )
        ),
        el(
            RichText,
            {
                key: 'editable',
                tagName: 'p',
                className: props.className,
                style: { textAlign: alignment },
                onChange: onChangeContent,
                value: content,
            }
        )
      ];
    },

    save: function(props) {
      var 
      content = props.attributes.content;
      alignment = props.attributes.alignment;
      return el( RichText.Content, {
        className: props.className,
        style: { textAlign: alignment },
        value: content
      });
    },
    
});