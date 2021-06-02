<?php
namespace AHT\OrderComment\Observer;

use Magento\Framework\Event\ObserverInterface;

class CheckoutSubmitAllAfterObserver implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
        if (empty($order) || empty($quote)) {
            return $this;
        }

        $shippingAddress = $quote->getShippingAddress();
        if ($shippingAddress->getOrderComment()) {
            $orderShippingAddress = $order->getShippingAddress();
            $orderShippingAddress->setOrderComment(
                $shippingAddress->getOrderComment()
            )->save();
        }

        return $this;
    }

}
