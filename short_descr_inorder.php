<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.plugin.helper');

class plgJshoppingOrderShort_descr_inorder extends JPlugin {

    function __construct(&$subject, $config) {
        parent::__construct($subject, $config);
    }

    public function onBeforeDisplayOrder($order) {
        $lang = JSFactory::getLang();
        $product = JTable::getInstance('product', 'jshop');
        $short_description = "short_description_" . $lang->lang;
        foreach ($order->items as $k => $item) {
            if ($order->order_status == $this->params->get('status')) {
                $product->load($item->product_id);
                $order->items[$k]->product_name.="<div class='short_description'>" . $product->$short_description . "</div>";
            }
        }
    }

}

?>