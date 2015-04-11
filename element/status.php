<?php

/**
 * @package Joomla
 * @copyright Copyright by Nevigen Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * */
defined('_JEXEC') or die;

class JFormFieldStatus extends JFormField {

    public $type = 'status';

    protected function getInput() {
        require_once (JPATH_SITE . '/components/com_jshopping/lib/factory.php');
        require_once (JPATH_SITE . '/components/com_jshopping/lib/functions.php');
        $db = JFactory::getDBO();
        $lang = JSFactory::getLang();
        $query = "SELECT `status_id` as id, `".$lang->get('name')."` as name FROM `#__jshopping_order_status` order by `status_id`";
        $list = $db->setQuery($query)->loadObjectList();
        $rows = array();
        $rows[0] = JText::_('JSELECT');
        foreach ($list as $row) {
            $rows[$row->id] = $row->name;
        }
        $ctrl = $this->name;
        $value = empty($this->value) ? '' : $this->value;

        return JHTML::_('select.genericlist', $rows, $ctrl, 'class="inputbox"', 'id', 'name', $value);
    }

}

?>
