( function ( blocks, blockEditor, element, components ) {

  let el = element.createElement;
  let RichText = blockEditor.RichText;
  let useBlockProps = blockEditor.useBlockProps;
  let BlockControls = blockEditor.BlockControls;
  let AlignmentToolbar = blockEditor.AlignmentToolbar;
  let MediaUpload = blockEditor.MediaUpload;
  let InspectorControls = blockEditor.InspectorControls;
  let ToggleControl = components.ToggleControl;
  let PanelBody = components.PanelBody;
  let Button = components.Button;
  let ColorPicker = components.ColorPicker;

  blocks.registerBlockType( 'yuna-blocks/about', {

    edit: function ( props ) {

      let blockProps = useBlockProps();
      let blockTitle = props.attributes.blockTitle;
      let alignment = props.attributes.alignment;
      let subtitle = props.attributes.subtitle;
      let imgID = props.attributes.imgID;
      let imgURL = props.attributes.imgURL;
      let titleColor = props.attributes.titleColor;

      /*function onSelectImg( img ){
        let imgAttr = this.props.setAttributes({
          imgID: img.id,
          imgURL: img.url
        });

        return imgAttr
      }*/

      var onSelectImage = function ( img ) {
        return props.setAttributes( {
          imgURL: img.url,
          imgID: img.id,
        } );
      };

      let greedChanger = props.attributes.greedChanger;


      function onChangeBlockTitle( newBlockTitle) {
        props.setAttributes( {blockTitle: newBlockTitle} );
      }

      function onChangeBlockSubtitle( newSubTitle ) {
        props.setAttributes( { subtitle: newSubTitle} );
      }

      function onChangeAlignment( newAlignment ) {
        props.setAttributes( {
          alignment:
            newAlignment === undefined ? 'left' : newAlignment,
        } );
      }

      function onChangeStyleSettings() {
        props.setAttributes( { greedChanger: ! greedChanger } );
      }

      return [
        el(
          InspectorControls,
          {},
          el(
            PanelBody, {
              title: 'My Option',
              initialOpen: true
            },
            el(
              ToggleControl, {
                label: 'Add fluid grid in block',
                checked: greedChanger,
                onChange: onChangeStyleSettings
              }
            ),
            el(
              ColorPicker,
              {
                label: 'Title color',
                defaultValue: '#030'
              }
            )

          ),
        ),
        el(
        'section',
        blockProps,
        el(
          'div',{className: 'container'
          },
          el(
            'div',{className: 'row'},
            el(
              BlockControls,
              { key: 'controls' },

              el(
                AlignmentToolbar, {
                  value: alignment,
                  onChange: onChangeAlignment,
                }
              )
            ),

            el(
              RichText, {
                key: 'richtext',
                tagName: 'h2',
                style: { textAlign: alignment },
                onChange: onChangeBlockTitle,
                value: blockTitle,
                placeholder: 'Enter block title',
              }
            )
          ),
          el(
            'div',{className: 'row'},
            el(
              'div',{className: 'pic-wrapper col-lg-6'},
              ! imgID ?
              el( MediaUpload, {
                onSelect: onSelectImage,
                allowedTypes: 'image',
                value: imgID,
                render: ( obj ) => {
                  return el(
                    Button,
                    {
                      onClick: obj.open,
                    },

                    'Upload Image'
                  );
                },
              } ):
                el( MediaUpload, {
                  onSelect: onSelectImage,
                  allowedTypes: 'image',
                  value: imgID,
                  render: ( obj ) => {
                    return el(
                      'img', { src: imgURL, onClick: obj.open}
                    );
                  },
                } )

            ),
            el(
              'div',{className: 'text-wrapper col-lg-6'},
              el(
                RichText, {
                  key: 'richtext',
                  tagName: 'h3',
                  style: { textAlign: alignment },
                  onChange: onChangeBlockSubtitle,
                  value: subtitle,
                  placeholder: 'Enter subtitle',

                }
              )
            )

          )

        )
      )
      ];

    },

    save: function ( props ) {

      let blockProps = useBlockProps.save();

      return el(
        'section',
        blockProps,
        el(
          'div', {className: props.attributes.greedChanger ? 'container-fluid' : 'container'},
          el(
            'div',{className: 'row'},
            el(
              RichText.Content,{
                tagName: 'h2',
                className: 'block-title col-12 text-' + props.attributes.alignment,
                value: props.attributes.blockTitle,
              }
            )
          ),
          el(
            'div',{className: 'row'},
            el(
              'div',{className: 'pic-wrapper col-lg-6'},
              el( 'img', { src: props.attributes.mediaURL } )
            ),
            el(
              'div',{className: 'text-wrapper col-lg-6'},
              el(
                RichText.Content,{
                  tagName: 'h3',
                  className: 'subtitle col-12 text-' + props.attributes.alignment,
                  value: props.attributes.subtitle,
                }
              )
            )

          )
        )

      );
    },
  } );
} )
(
  window.wp.blocks,
  window.wp.blockEditor,
  window.wp.element,
  window.wp.components
);