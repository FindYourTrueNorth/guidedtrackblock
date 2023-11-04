/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps, PlainText } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */

export default function save(props) {
  const { attributes } = props;
  const { url } = attributes;
  return (
    <div {...useBlockProps.save()}>
      <div class="guidedtrack program_container" id={url} data-environment="production" >
      <div id="program_navigation" role="banner">
        <div id="back-button"></div>
        <div class="navigation_container" role="navigation"></div>
        <div id="run-menu" role="navigation"></div>
        <div class="points" role="complementary" aria-label="points" aria-live="assertive">
          <div class="total"></div>
          <div class="change"></div>
        </div>
      </div>
      <div class="maintain" role="status" aria-label="note" aria-live="polite"></div>
      <div class="main" role="main" aria-live="polite" ></div>
</div>
      
    </div>
  );
}

