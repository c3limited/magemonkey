<?php
/**
 * Author : Ebizmarts <info@ebizmarts.com>
 * Date   : 6/25/13
 * Time   : 2:15 PM
 * File   : Hint.php
 * Module : Ebizmarts_Magemonkey
 */
class Ebizmarts_Autoresponder_Block_Adminhtml_System_Config_Birthday_Fieldset_Hint
    extends Mage_Adminhtml_Block_Abstract
    implements Varien_Data_Form_Element_Renderer_Interface
{
    protected $_template = 'ebizmarts/autoresponder/system/config/birthday/fieldset/hint.phtml';

    /**
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        return $this->toHtml();
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return (string) Mage::getConfig()->getNode('modules/Ebizmarts_Autoresponder/version');
    }

    /**
     * @return string
     */
    public function getPxParams() {
        $v = (string)Mage::getConfig()->getNode('modules/Ebizmarts_Autoresponder/version');
        $ext = "Abandoned Cart;{$v}";

        $modulesArray = (array)Mage::getConfig()->getNode('modules')->children();
        $aux = (array_key_exists('Enterprise_Enterprise', $modulesArray))? 'EE' : 'CE' ;
        $mageVersion = Mage::getVersion();
        $mage = "Magento {$aux};{$mageVersion}";

        $hash = md5($ext . '_' . $mage . '_' . $ext);

        return "ext=$ext&mage={$mage}&ctrl={$hash}";

    }

    /**
     * @return mixed
     */
    public function verify()
    {
        return Mage::helper('ebizmarts_autoresponder')->verify();
    }

}