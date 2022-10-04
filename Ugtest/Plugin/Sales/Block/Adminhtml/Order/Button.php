<?php
namespace Intest\Ugtest\Plugin\Sales\Block\Adminhtml\Order;

use Magento\Sales\Block\Adminhtml\Order\View as OrderView;

class Button
{
   public function beforeSetLayout(OrderView $subject)
   {
       $subject->addButton(
           'order_custom_button',
           [
               'label' => __('Test action'),
               'class' => __('test-action'),
               'id' => 'order-view-custom-button',
               'onclick' => 'setLocation(\'' . $subject->getUrl('routes/controller/action') . '\')'
           ]
       );
   }
}