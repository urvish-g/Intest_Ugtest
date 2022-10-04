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
       $subject->addButton(
           'action1',
           [
               'label' => __('Action1'),
               'class' => __('action1'),
               'id' => 'order-view-custom-action1',
           ]
       );
       $subject->addButton(
           'action2',
           [
               'label' => __('Action2'),
               'class' => __('action2'),
               'id' => 'order-view-custom-action2'
           ]
       );
       $subject->addButton(
           'action3',
           [
               'label' => __('Action3'),
               'class' => __('action3'),
               'id' => 'order-view-custom-action3'
           ]
       );


   }
}