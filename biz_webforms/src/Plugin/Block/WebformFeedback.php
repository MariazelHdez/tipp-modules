<?php
  namespace Drupal\biz_webforms\Plugin\Block;
  
  use Drupal\Core\Block\BlockBase;
  use Drupal\Core\Block\BlockPluginInterface;
  use Drupal\Core\Access\AccessResult;
  use Drupal\Core\Cache\Cache;
/**
 * Provides a custom block with the organizations
 * 
 * @Block(
 *   id = "webform_feedback_block",
 *   admin_label = @Translation("Feedback form"),
 *   category = @Translation("Bizont custom block")
 * )
 */
  class WebformFeedback extends BlockBase implements BlockPluginInterface{

    public function getCacheMaxAge() {
      // If you want to disable caching for this block.
      return 0;
    }
    /**
     * {@inheritdoc}
    */
    public function build() {
        $content = [];
        $webform = \Drupal::entityTypeManager()->getStorage('webform')->load('feedback_form');
        $content[] = $webform->getSubmissionForm();
        return $content;
    }  
  }